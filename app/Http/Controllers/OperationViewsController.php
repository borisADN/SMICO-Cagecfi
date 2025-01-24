<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationViewsController extends Controller
{
    public function AccountTransfer()
    {

        $groupedOptions = session('groupedOptions');
        $userSpace = session('userSpace');
        $completeName = session('complete_name');
        $comptes = session('comptes');


        return view(
            'OperationViews.AccountTransfer',
            [
                'groupedOptions' => $groupedOptions,
                'userSpace' => $userSpace,
                'completeName' => $completeName,
                'comptes' => $comptes,
                'refsession' => session('referencereponse'),

            ]
        );
    }
    public function AccountVirement()
    {
        $groupedOptions = session('groupedOptions');
        $userSpace = session('userSpace');
        $completeName = session('complete_name');
        $comptes = session('comptes');

        return view(
            'OperationViews.AccountVirement',
            [
                'groupedOptions' => $groupedOptions,
                'userSpace' => $userSpace,
                'completeName' => $completeName,
                'comptes' => $comptes,
                'refsession' => session('referencereponse'),
            ]
        );
    }
    public function WalletToBank()
    {
        $groupedOptions = session('groupedOptions');
        $userSpace = session('userSpace');
        $completeName = session('complete_name');
        $comptes = session('comptes');
        $complete_telephone = session('complete_telephone');
        $firstName = session('firstName');
        $lastName = session('lastName');
        $indicatif = session('indicatif');
        $telephone = session('telephone');

        return view(
            'OperationViews.WalletToBank',
            [
                'groupedOptions' => $groupedOptions,
                'userSpace' => $userSpace,
                'completeName' => $completeName,
                'comptes' => $comptes,
                'refsession' => session('referencereponse'),
                'complete_telephone' => $complete_telephone,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'indicatif' => $indicatif,
                'telephone' => $telephone,

            ]
        );
    }
    public function BankToWallet()
    {
        $groupedOptions = session('groupedOptions');
        $userSpace = session('userSpace');
        $completeName = session('complete_name');
        $comptes = session('comptes');
        $complete_telephone = session('complete_telephone');
        $firstName = session('firstName');
        $lastName = session('lastName');
        $indicatif = session('indicatif');
        $telephone = session('telephone');
       

        return view(
            'OperationViews.BankToWallet',
            [
                'groupedOptions' => $groupedOptions,
                'userSpace' => $userSpace,
                'completeName' => $completeName,
                'comptes' => $comptes,
                'refsession' => session('referencereponse'),
                'complete_telephone' => $complete_telephone,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'indicatif' => $indicatif,
                'telephone' => $telephone,
                
            ]
        );
    }

    public function miseDispo(){
        $groupedOptions = session('groupedOptions');
        $userSpace = session('userSpace');
        $completeName = session('complete_name');
        $comptes = session('comptes');

        return view(
            'OperationViews.miseDispo',
            [
                'groupedOptions' => $groupedOptions,
                'userSpace' => $userSpace,
                'completeName' => $completeName,
                'comptes' => $comptes,
                'refsession' => session('referencereponse'),

            ]
        );
    }
}
