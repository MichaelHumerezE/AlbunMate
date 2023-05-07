<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;

date_default_timezone_set('America/La_Paz');

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );
    }

    public function payWithPayPal($monto)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal(floatval($monto));
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Suscripción en AlbunMate');

        $callBackUrl = url('/payPal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callBackUrl)
            ->setCancelUrl($callBackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            //echo $payment;

            //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');
        if (!$paymentId || !$payerId || !$token) {
            return redirect('/UserPlanes')->with('danger', 'No se pudo proceder con el pago a través de PayPal.');
        }
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        //Execute the payment
        $result = $payment->execute($execution, $this->apiContext);
        if ($result->getState() == 'approved') {
            $monto = $payment->getTransactions()[0]->getAmount()->getTotal();
            if ($monto == 5) {
                $plan = 'Plan Invitado';
            } else {
                if ($monto == 10) {
                    $plan = 'Plan Fotógrafo';
                } else {
                    if ($monto == 15) {
                        $plan = 'Plan Organizador';
                    }
                }
            }
            $fecha = date('Y-m-d');
            $fecha = new DateTime($fecha);
            $fecha = $fecha->modify('+1 month');
            // Pago
            Suscripcion::create([
                'fechaIni' => date('Y-m-d'),
                'fechaFin' => $fecha->format('Y-m-d'),
                'monto' => $monto,
                'plan' => $plan,
                'id_usuario' => auth()->user()->id,
            ]);
            //
            // Actualizar suscripcion
            $user = User::FindOrFail(auth()->user()->id);
            $user->suscripcion = 1;
            $user->save();
            return redirect('/catalogoEventos')->with('info', '!Gracias¡, El pago a través de PayPal se ha realizado correctamente.');
        }
        return redirect('/UserPlanes')->with('danger', 'Lo sentimos, El pago a través de PayPal no se pudo realizar.');
    }
}
