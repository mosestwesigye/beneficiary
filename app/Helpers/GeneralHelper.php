<?php

/**
 * Created by PhpStorm.
 * User: Tj
 * Date: 6/29/2016
 * Time: 3:11 PM
 */
namespace App\Helpers;

use App\Models\Asset;
use App\Models\AssetValuation;
use App\Models\AuditTrail;
use App\Models\Capital;
use App\Models\Expense;
use App\Models\Package;
use App\Models\PackageRepayment;
use App\Models\PackageSchedule;
use App\Models\OtherIncome;
use App\Models\Payroll;
use App\Models\PayrollMeta;
use App\Models\Saving;
use App\Models\SavingTransaction;
use App\Models\Setting;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class GeneralHelper
{
    /*
     * determine interest
     */
    public static function determine_interest_rate($id)
    {
        $package = Package::find($id);
        $interest = '';
        if ($package->override_interest == 1) {
            $interest = $package->override_interest_amount;
        } else {
            if ($package->repayment_cycle == 'annually') {
                //return the interest per year
                if ($package->interest_period == 'year') {
                    $interest = $package->interest_rate;
                }
                if ($package->interest_period == 'month') {
                    $interest = $package->interest_rate * 12;
                }
                if ($package->interest_period == 'week') {
                    $interest = $package->interest_rate * 52;
                }
                if ($package->interest_period == 'day') {
                    $interest = $package->interest_rate * 365;
                }
            }
            if ($package->repayment_cycle == 'semi_annually') {
                //return the interest per semi annually
                if ($package->interest_period == 'year') {
                    $interest = $package->interest_rate / 2;
                }
                if ($package->interest_period == 'month') {
                    $interest = $package->interest_rate * 6;
                }
                if ($package->interest_period == 'week') {
                    $interest = $package->interest_rate * 26;
                }
                if ($package->interest_period == 'day') {
                    $interest = $package->interest_rate * 182.5;
                }
            }
            if ($package->repayment_cycle == 'quarterly') {
                //return the interest per quaterly

                if ($package->interest_period == 'year') {
                    $interest = $package->interest_rate / 4;
                }
                if ($package->interest_period == 'month') {
                    $interest = $package->interest_rate * 3;
                }
                if ($package->interest_period == 'week') {
                    $interest = $package->interest_rate * 13;
                }
                if ($package->interest_period == 'day') {
                    $interest = $package->interest_rate * 91.25;
                }
            }
            if ($package->repayment_cycle == 'bi_monthly') {
                //return the interest per bi-monthly
                if ($package->interest_period == 'year') {
                    $interest = $package->interest_rate / 6;
                }
                if ($package->interest_period == 'month') {
                    $interest = $package->interest_rate * 2;
                }
                if ($package->interest_period == 'week') {
                    $interest = $package->interest_rate * 8.67;
                }
                if ($package->interest_period == 'day') {
                    $interest = $package->interest_rate * 58.67;
                }

            }

            if ($package->repayment_cycle == 'monthly') {
                //return the interest per monthly

                if ($package->interest_period == 'year') {
                    $interest = $package->interest_rate / 12;
                }
                if ($package->interest_period == 'month') {
                    $interest = $package->interest_rate * 1;
                }
                if ($package->interest_period == 'week') {
                    $interest = $package->interest_rate * 4.33;
                }
                if ($package->interest_period == 'day') {
                    $interest = $package->interest_rate * 30.4;
                }
            }
            if ($package->repayment_cycle == 'weekly') {
                //return the interest per weekly

                if ($package->interest_period == 'year') {
                    $interest = $package->interest_rate / 52;
                }
                if ($package->interest_period == 'month') {
                    $interest = $package->interest_rate / 4;
                }
                if ($package->interest_period == 'week') {
                    $interest = $package->interest_rate;
                }
                if ($package->interest_period == 'day') {
                    $interest = $package->interest_rate * 7;
                }
            }
            if ($package->repayment_cycle == 'daily') {
                //return the interest per day

                if ($package->interest_period == 'year') {
                    $interest = $package->interest_rate / 365;
                }
                if ($package->interest_period == 'month') {
                    $interest = $package->interest_rate / 30.4;
                }
                if ($package->interest_period == 'week') {
                    $interest = $package->interest_rate / 7.02;
                }
                if ($package->interest_period == 'day') {
                    $interest = $package->interest_rate * 1;
                }
            }
        }
        return $interest / 100;
    }

//determine monthly payment using amortization
    public static function amortized_monthly_payment($id, $balance)
    {
        $package = package::find($id);
        $period = GeneralHelper::package_period($id);
        $interest_rate = GeneralHelper::determine_interest_rate($id);
        //calculate here
        $amount = ($interest_rate * $balance * pow((1 + $interest_rate), $period)) / (pow((1 + $interest_rate),
                    $period) - 1);
        return $amount;
    }

    public static function package_period($id)
    {
        $package = package::find($id);
        $period = 0;
        if ($package->repayment_cycle == 'annually') {
            if ($package->package_duration_type == 'year') {
                $period = ceil($package->package_duration);
            }
            if ($package->package_duration_type == 'month') {
                $period = ceil($package->package_duration * 12);
            }
            if ($package->package_duration_type == 'week') {
                $period = ceil($package->package_duration * 52);
            }
            if ($package->package_duration_type == 'day') {
                $period = ceil($package->package_duration * 365);
            }
        }
        if ($package->repayment_cycle == 'semi_annually') {
            if ($package->package_duration_type == 'year') {
                $period = ceil($package->package_duration * 2);
            }
            if ($package->package_duration_type == 'month') {
                $period = ceil($package->package_duration * 6);
            }
            if ($package->package_duration_type == 'week') {
                $period = ceil($package->package_duration * 26);
            }
            if ($package->package_duration_type == 'day') {
                $period = ceil($package->package_duration * 182.5);
            }
        }
        if ($package->repayment_cycle == 'quarterly') {
            if ($package->package_duration_type == 'year') {
                $period = ceil($package->package_duration);
            }
            if ($package->package_duration_type == 'month') {
                $period = ceil($package->package_duration * 12);
            }
            if ($package->package_duration_type == 'week') {
                $period = ceil($package->package_duration * 52);
            }
            if ($package->package_duration_type == 'day') {
                $period = ceil($package->package_duration * 365);
            }
        }
        if ($package->repayment_cycle == 'bi_monthly') {
            if ($package->package_duration_type == 'year') {
                $period = ceil($package->package_duration*6);
            }
            if ($package->package_duration_type == 'month') {
                $period = ceil($package->package_duration * 2);
            }
            if ($package->package_duration_type == 'week') {
                $period = ceil($package->package_duration * 8);
            }
            if ($package->package_duration_type == 'day') {
                $period = ceil($package->package_duration * 60);
            }
        }

        if ($package->repayment_cycle == 'monthly') {
            if ($package->package_duration_type == 'year') {
                $period = ceil($package->package_duration * 12);
            }
            if ($package->package_duration_type == 'month') {
                $period = ceil($package->package_duration);
            }
            if ($package->package_duration_type == 'week') {
                $period = ceil($package->package_duration * 4.3);
            }
            if ($package->package_duration_type == 'day') {
                $period = ceil($package->package_duration * 30.4);
            }
        }
        if ($package->repayment_cycle == 'weekly') {
            if ($package->package_duration_type == 'year') {
                $period = ceil($package->package_duration * 52);
            }
            if ($package->package_duration_type == 'month') {
                $period = ceil($package->package_duration * 4);
            }
            if ($package->package_duration_type == 'week') {
                $period = ceil($package->package_duration * 1);
            }
            if ($package->package_duration_type == 'day') {
                $period = ceil($package->package_duration * 7);
            }
        }
        if ($package->repayment_cycle == 'daily') {
            if ($package->package_duration_type == 'year') {
                $period = ceil($package->package_duration * 365);
            }
            if ($package->package_duration_type == 'month') {
                $period = ceil($package->package_duration * 30.42);
            }
            if ($package->package_duration_type == 'week') {
                $period = ceil($package->package_duration * 7.02);
            }
            if ($package->package_duration_type == 'day') {
                $period = ceil($package->package_duration);
            }
        }
        return $period;
    }

    public static function time_ago($eventTime)
    {
        $totaldelay = time() - strtotime($eventTime);
        if ($totaldelay <= 0) {
            return '';
        } else {
            if ($days = floor($totaldelay / 86400)) {
                $totaldelay = $totaldelay % 86400;
                return $days . ' days ago';
            }
            if ($hours = floor($totaldelay / 3600)) {
                $totaldelay = $totaldelay % 3600;
                return $hours . ' hours ago';
            }
            if ($minutes = floor($totaldelay / 60)) {
                $totaldelay = $totaldelay % 60;
                return $minutes . ' minutes ago';
            }
            if ($seconds = floor($totaldelay / 1)) {
                $totaldelay = $totaldelay % 1;
                return $seconds . ' seconds ago';
            }
        }
    }

    public static function determine_due_date($id, $date)
    {
        $schedule = PackageSchedule::where('due_date', ' >=', $date)->where('package_id', $id)->orderBy('due_date',
            'asc')->first();
        if (!empty($schedule)) {
            return $schedule->due_date;
        } else {
            $schedule = PackageSchedule::where('package_id',
                $id)->orderBy('due_date',
                'desc')->first();
            if ($date > $schedule->due_date) {
                return $schedule->due_date;
            } else {
                $schedule = PackageSchedule::where('due_date', '>', $date)->where('package_id',
                    $id)->orderBy('due_date',
                    'asc')->first();
                return $schedule->due_date;
            }

        }
    }

    public static function package_total_interest($id, $date = '')
    {
        if (empty($date)) {
            return PackageSchedule::where('package_id', $id)->sum('interest');
        } else {
            return PackageSchedule::where('package_id', $id)->where('due_date', '<=', $date)->sum('interest');
        }
    }

    public static function package_total_principal($id, $date = '')
    {
        if (empty($date)) {
            return PackageSchedule::where('package_id', $id)->sum('principal');
        } else {
            return PackageSchedule::where('package_id', $id)->where('due_date', '<=', $date)->sum('principal');
        }
    }

    public static function package_total_fees($id, $date = '')
    {
        if (empty($date)) {
            return PackageSchedule::where('package_id', $id)->sum('fees');
        } else {
            return PackageSchedule::where('package_id', $id)->where('due_date', '<=', $date)->sum('fees');
        }
    }

    public static function package_total_penalty($id, $date = '')
    {
        if (empty($date)) {
            return PackageSchedule::where('package_id', $id)->sum('penalty');
        } else {
            return PackageSchedule::where('package_id', $id)->where('due_date', '<=', $date)->sum('penalty');
        }
    }

    public static function package_total_paid($id, $date = '')
    {
        if (empty($date)) {
            return PackageRepayment::where('package_id', $id)->sum('amount');
        } else {
            return PackageRepayment::where('package_id', $id)->where('due_date', '<=', $date)->sum('amount');
        }

    }

    public static function package_total_balance($id, $date = '')
    {
        $package = Package::find($id);
        if (empty($date)) {
            if ($package->override == 1) {
                return $package->balance - GeneralHelper::package_total_paid($id);
            } else {
                return GeneralHelper::package_total_due_amount($id) - GeneralHelper::package_total_paid($id);
            }

        } else {
            return GeneralHelper::package_total_due_amount($id, $date) - GeneralHelper::package_total_paid($id, $date);
        }

    }

    public static function package_total_due_amount($id, $date = '')
    {
        if (empty($date)) {
            return (GeneralHelper::package_total_penalty($id) + GeneralHelper::package_total_fees($id) + GeneralHelper::package_total_interest($id) + GeneralHelper::package_total_principal($id));
        } else {
            return (GeneralHelper::package_total_penalty($id, $date) + GeneralHelper::package_total_fees($id,
                    $date) + GeneralHelper::package_total_interest($id, $date) + GeneralHelper::package_total_principal($id,
                    $date));

        }

    }

    public static function package_total_due_period($id, $date)
    {
        return (PackageSchedule::where('package_id', $id)->where('due_date',
                $date)->sum('penalty') + PackageSchedule::where('package_id', $id)->where('due_date',
                $date)->sum('fees') + PackageSchedule::where('package_id', $id)->where('due_date',
                $date)->sum('principal') + PackageSchedule::where('package_id', $id)->where('due_date',
                $date)->sum('interest'));

    }

    public static function package_total_paid_period($id, $date)
    {
        return packageRepayment::where('package_id', $id)->where('due_date', $date)->sum('amount');

    }

    public static function packages_total_paid($start_date = '', $end_date = '')
    {

        if (empty($start_date)) {
            $paid = 0;
            foreach (Package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->get() as $key) {
                $paid = $paid + PackageRepayment::where('package_id', $key->id)->sum('amount');
            }
            return $paid;
        } else {
            $paid = 0;
            foreach (Package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->whereBetween('release_date',
                [$start_date, $end_date])->get() as $key) {
                $paid = $paid + packageRepayment::where('package_id', $key->id)->sum('amount');
            }
            return $paid;

        }

    }


    public static function addMonths($date, $months)
    {
        $orig_day = $date->format("d");
        $date->modify("+" . $months . " months");
        while ($date->format("d") < $orig_day && $date->format("d") < 5) {
            $date->modify("-1 day");
        }
    }

    //determine paid principal
    public static function package_paid_item($id, $item = 'principal', $date = '')
    {
        $package = package::find($id);
        $principal = 0;
        $interest = 0;
        $penalty = 0;
        $fees = 0;
        if (empty($date)) {
            $schedules = $package->schedules;
        } else {
            $schedules = PackageSchedule::where('package_id', $id)->where('due_date', '<=', $date)->get();
        }
        $repayment_order = unserialize($package->package_product->repayment_order);
        foreach ($schedules as $schedule) {
            $payments = packageRepayment::where('package_id', $id)->where('due_date', $schedule->due_date)->sum('amount');
            if ($payments > 0) {
                foreach ($repayment_order as $order) {
                    if ($payments > 0) {
                        if ($order == 'interest') {
                            if ($payments > $schedule->interest) {
                                $interest = $interest + $schedule->interest;
                                $payments = $payments - $schedule->interest;
                            } else {
                                $interest = $interest + $payments;
                                $payments = 0;
                            }
                        }
                        if ($order == 'penalty') {
                            if ($payments > $schedule->penalty) {
                                $penalty = $penalty + $schedule->penalty;
                                $payments = $payments - $schedule->penalty;
                            } else {
                                $penalty = $penalty + $payments;
                                $payments = 0;
                            }
                        }
                        if ($order == 'fees') {
                            if ($payments > $schedule->fees) {
                                $fees = $fees + $schedule->fees;
                                $payments = $payments - $schedule->fees;
                            } else {
                                $fees = $fees + $payments;
                                $payments = 0;
                            }
                        }
                        if ($order == 'principal') {
                            if ($payments > $schedule->principal) {
                                $principal = $principal + $schedule->principal;
                                $payments = $payments - $schedule->principal;
                            } else {
                                $principal = $principal + $payments;
                                $payments = 0;
                            }
                        }
                    }
                }
            }
            //apply remainder to principal
            $principal = $principal + $payments;
        }
        if ($item == 'principal') {
            return $principal;
        }
        if ($item == 'fees') {
            return $fees;
        }
        if ($item == 'penalty') {
            return $penalty;
        }
        if ($item == 'interest') {
            return $interest;
        }
        return $principal;
    }

    public static function single_payroll_total_pay($id)
    {
        return PayrollMeta::where('payroll_id', $id)->where('position', 'bottom_left')->sum('value');
    }

    public static function single_payroll_total_deductions($id)
    {
        return PayrollMeta::where('payroll_id', $id)->where('position', 'bottom_right')->sum('value');
    }

    public static function total_expenses($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            return Expense::where('branch_id', session('branch_id'))->sum('amount');
        } else {
            return Expense::where('branch_id', session('branch_id'))->whereBetween('date', [$start_date, $end_date])->sum('amount');

        }

    }

    public static function total_payroll($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            $payroll = 0;
            foreach (Payroll::where('branch_id', session('branch_id'))->get() as $key) {
                $payroll = $payroll + GeneralHelper::single_payroll_total_pay($key->id);
            }
            return $payroll;
        } else {
            $payroll = 0;
            foreach (Payroll::where('branch_id', session('branch_id'))->whereBetween('date', [$start_date, $end_date])->get() as $key) {
                $payroll = $payroll + GeneralHelper::single_payroll_total_pay($key->id);
            }
            return $payroll;

        }

    }

    public static function packages_total_principal($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            $principal = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->get() as $key) {
                $principal = $principal + $key->principal;
            }
            return $principal;
        } else {
            $principal = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->whereBetween('release_date',
                [$start_date, $end_date])->get() as $key) {
                $principal = $principal + $key->principal;
            }
            return $principal;

        }

    }

    public static function total_other_income($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            return OtherIncome::where('branch_id', session('branch_id'))->sum('amount');
        } else {
            return OtherIncome::where('branch_id', session('branch_id'))->whereBetween('date', [$start_date, $end_date])->sum('amount');

        }

    }

    public static function total_savings_interest($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            return SavingTransaction::where('branch_id', session('branch_id'))->where('type', 'interest')->sum('amount');
        } else {
            return SavingTransaction::where('branch_id', session('branch_id'))->where('type', 'interest')->whereBetween('date',
                [$start_date, $end_date])->sum('amount');

        }

    }

    public static function total_savings_deposits($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            return SavingTransaction::where('branch_id', session('branch_id'))->where('type', 'deposit')->sum('amount');
        } else {
            return SavingTransaction::where('branch_id', session('branch_id'))->where('type', 'deposit')->whereBetween('date',
                [$start_date, $end_date])->sum('amount');

        }

    }

    public static function total_savings_withdrawals($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            return SavingTransaction::where('branch_id', session('branch_id'))->where('type', 'withdrawal')->sum('amount');
        } else {
            return SavingTransaction::where('branch_id', session('branch_id'))->where('type', 'withdrawal')->whereBetween('date',
                [$start_date, $end_date])->sum('amount');

        }

    }

    public static function total_capital($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            return Capital::where('branch_id', session('branch_id'))->sum('amount');
        } else {
            return Capital::where('branch_id', session('branch_id'))->whereBetween('date', [$start_date, $end_date])->sum('amount');

        }

    }

    public static function packages_total_paid_item($item, $start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            $amount = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->get() as $key) {
                $amount = $amount + GeneralHelper::package_paid_item($key->id, $item, $key->due_date);
            }
            return $amount;
        } else {
            $amount = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->whereBetween('release_date',
                [$start_date, $end_date])->get() as $key) {
                $amount = $amount + GeneralHelper::package_paid_item($key->id, $item, $key->due_date);
            }
            return $amount;

        }

    }

    public static function packages_total_due_item($item, $start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            $amount = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->get() as $key) {
                if ($item == 'principal') {
                    $amount = $amount + GeneralHelper::package_total_principal($key->id);
                }
                if ($item == 'interest') {
                    $amount = $amount + GeneralHelper::package_total_interest($key->id);
                }
                if ($item == 'fees') {
                    $amount = $amount + GeneralHelper::package_total_fees($key->id);
                }
                if ($item == 'penalty') {
                    $amount = $amount + GeneralHelper::package_total_penalty($key->id);
                }

            }
            return $amount;
        } else {
            $amount = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->whereBetween('release_date',
                [$start_date, $end_date])->get() as $key) {
                if ($item == 'principal') {
                    $amount = $amount + GeneralHelper::package_total_principal($key->id);
                }
                if ($item == 'interest') {
                    $amount = $amount + GeneralHelper::package_total_interest($key->id);
                }
                if ($item == 'fees') {
                    $amount = $amount + GeneralHelper::package_total_fees($key->id);
                }
                if ($item == 'penalty') {
                    $amount = $amount + GeneralHelper::package_total_penalty($key->id);
                }
            }
            return $amount;
        }

    }

    public static function packages_total_default($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            $principal = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'written_off')->get() as $key) {
                $principal = $principal + ($key->principal - GeneralHelper::package_total_paid($key->id));
            }
            return $principal;
        } else {
            $principal = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'written_off')->whereBetween('release_date',
                [$start_date, $end_date])->get() as $key) {
                $principal = $principal + ($key->principal - GeneralHelper::package_total_paid($key->id));
            }
            return $principal;

        }

    }

    public static function packages_total_due($start_date = '', $end_date = '')
    {
        if (empty($start_date)) {
            $due = 0;
            foreach (Package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->get() as $key) {
                $due = $due + GeneralHelper::package_total_due_amount($key->id);
            }
            return $due;
        } else {
            $due = 0;
            foreach (package::where('branch_id', session('branch_id'))->where('status', 'disbursed')->whereBetween('release_date',
                [$start_date, $end_date])->get() as $key) {
                $due = $due + GeneralHelper::package_total_due_amount($key->id);
            }
            return $due;

        }
    }

    public static function borrower_packages_total_due($id)
    {

        $due = 0;
        foreach (package::where('status', 'disbursed')->where('borrower_id', $id)->get() as $key) {
            $due = $due + GeneralHelper::package_total_due_amount($key->id);
        }
        return $due;

    }

    public static function borrower_packages_total_paid($id)
    {

        $paid = 0;
        foreach (package::where('status', 'disbursed')->where('borrower_id', $id)->get() as $key) {
            $paid = $paid + packageRepayment::where('package_id', $key->id)->sum('amount');
        }
        return $paid;

    }

    public static function audit_trail($notes)
    {
        $audit_trail = new AuditTrail();
        $audit_trail->user_id = Sentinel::getUser()->id;
        $audit_trail->user = Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name;
        $audit_trail->notes = $notes;
        $audit_trail->branch_id = session('branch_id');
        $audit_trail->save();

    }

    public static function savings_account_balance($id)
    {

        $balance = 0;
        foreach (SavingTransaction::where('savings_id', $id)->get() as $key) {
            if ($key->type == 'deposit' || $key->type == 'interest' || $key->type == 'dividend' || $key->type == 'guarantee_restored') {
                $balance = $balance + $key->amount;
            } else {
                $balance = $balance - $key->amount;
            }
        }
        return $balance;

    }

    public static function borrower_savings_account_balance($id)
    {

        $balance = 0;
        if (!empty(Saving::where('borrower_id', $id)->first())) {
            foreach (SavingTransaction::where('savings_id', Saving::where('borrower_id', $id)->first()->id)->get() as $key) {
                if ($key->type == 'deposit' || $key->type == 'interest' || $key->type == 'dividend' || $key->type == 'guarantee_restored') {
                    $balance = $balance + $key->amount;
                } else {
                    $balance = $balance - $key->amount;
                }
            }
        }
        return $balance;

    }

    public static function asset_valuation($id, $start_date = '')
    {

        if (empty($start_date)) {
            $value = 0;
            if (!empty(AssetValuation::where('asset_id', $id)->orderBy('date', 'desc')->first())) {
                $value = AssetValuation::where('asset_id', $id)->orderBy('date', 'desc')->first()->amount;
            }
            return $value;
        } else {
            $value = 0;
            if (!empty(AssetValuation::where('asset_id', $id)->where('date', '<=', $start_date)->orderBy('date',
                'desc')->first())
            ) {
                $value = AssetValuation::where('asset_id', $id)->where('date', '<=', $start_date)->orderBy('date',
                    'desc')->first()->amount;
            }
            return $value;

        }

    }

    public static function asset_type_valuation($id, $start_date = '')
    {

        if (empty($start_date)) {
            $value = 0;
            foreach (Asset::where('branch_id', session('branch_id'))->where('asset_type_id', $id)->get() as $key) {
                if (!empty(AssetValuation::where('asset_id', $key->id)->orderBy('date', 'desc')->first())) {
                    $value = AssetValuation::where('asset_id', $key->id)->orderBy('date', 'desc')->first()->amount;
                }
            }
            return $value;
        } else {
            $value = 0;
            foreach (Asset::where('branch_id', session('branch_id'))->where('asset_type_id', $id)->get() as $key) {
                if (!empty(AssetValuation::where('asset_id', $key->id)->where('date', '<=',
                    $start_date)->orderBy('date',
                    'desc')->first())
                ) {
                    $value = AssetValuation::where('asset_id', $key->id)->where('date', '<=',
                        $start_date)->orderBy('date',
                        'desc')->first()->amount;
                }
            }
            return $value;

        }

    }
}
