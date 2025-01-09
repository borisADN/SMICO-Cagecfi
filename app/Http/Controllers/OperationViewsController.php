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

        return view(
            'OperationViews.WalletToBank',
            [
                'groupedOptions' => $groupedOptions,
                'userSpace' => $userSpace,
                'completeName' => $completeName,
                'comptes' => $comptes,
                'refsession' => session('referencereponse'),
            ]
        );
    }
    public function BankToWallet()
    {
        $groupedOptions = session('groupedOptions');
        $userSpace = session('userSpace');
        $completeName = session('complete_name');
        $comptes = session('comptes');

        return view(
            'OperationViews.BankToWallet',
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
