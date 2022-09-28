<?php

namespace Database\Seeders;

use App\Models\Backend\COA;
use App\Models\Backend\CoaGrandparent;
use App\Models\Backend\CoaGreatGrandparent;
use App\Models\Backend\CoaParent;
use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coa = array(
            array('id' => '1','name' => 'Accounts Receivable','code' => '120','coa_grandparents_id' => '1','coa_parents_id' => '1','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:19','updated_at' => '2022-01-11 11:32:19','deleted_at' => NULL),
            array('id' => '2','name' => 'Computer Equipment','code' => '160','coa_grandparents_id' => '1','coa_parents_id' => '2','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:19','updated_at' => '2022-01-11 11:32:19','deleted_at' => NULL),
            array('id' => '3','name' => 'Office Equipment','code' => '150','coa_grandparents_id' => '1','coa_parents_id' => '2','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:19','updated_at' => '2022-01-11 11:32:19','deleted_at' => NULL),
            array('id' => '4','name' => 'Inventory','code' => '140','coa_grandparents_id' => '1','coa_parents_id' => '3','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '5','name' => 'Budget - Finance Staff','code' => '857','coa_grandparents_id' => '1','coa_parents_id' => '6','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '6','name' => 'Accumulated Depreciation','code' => '170','coa_grandparents_id' => '1','coa_parents_id' => '7','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '7','name' => 'Accounts Payable','code' => '200','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '8','name' => 'Accruals','code' => '205','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '9','name' => 'Office Equipment','code' => '150','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '10','name' => 'Clearing Account','code' => '855','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '11','name' => 'Employee Benefits Payable','code' => '235','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '12','name' => 'Employee Deductions payable','code' => '236','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:20','updated_at' => '2022-01-11 11:32:20','deleted_at' => NULL),
            array('id' => '13','name' => 'Historical Adjustments','code' => '255','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:21','updated_at' => '2022-01-11 11:32:21','deleted_at' => NULL),
            array('id' => '14','name' => 'Revenue Received in Advance','code' => '835','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:21','updated_at' => '2022-01-11 11:32:21','deleted_at' => NULL),
            array('id' => '15','name' => 'Rounding','code' => '260','coa_grandparents_id' => '2','coa_parents_id' => '8','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:22','updated_at' => '2022-01-11 11:32:22','deleted_at' => NULL),
            array('id' => '16','name' => 'Costs of Goods Sold','code' => '500','coa_grandparents_id' => '3','coa_parents_id' => '11','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:22','updated_at' => '2022-01-11 11:32:22','deleted_at' => NULL),
            array('id' => '17','name' => 'Advertising','code' => '600','coa_grandparents_id' => '3','coa_parents_id' => '12','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:22','updated_at' => '2022-01-11 11:32:22','deleted_at' => NULL),
            array('id' => '18','name' => 'Automobile Expenses','code' => '644','coa_grandparents_id' => '3','coa_parents_id' => '12','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:22','updated_at' => '2022-01-11 11:32:22','deleted_at' => NULL),
            array('id' => '19','name' => 'Bad Debts','code' => '684','coa_grandparents_id' => '3','coa_parents_id' => '12','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:22','updated_at' => '2022-01-11 11:32:22','deleted_at' => NULL),
            array('id' => '20','name' => 'Bank Revaluations','code' => '810','coa_grandparents_id' => '3','coa_parents_id' => '12','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:23','updated_at' => '2022-01-11 11:32:23','deleted_at' => NULL),
            array('id' => '21','name' => 'Bank Service Charges','code' => '605','coa_grandparents_id' => '3','coa_parents_id' => '12','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:23','updated_at' => '2022-01-11 11:32:23','deleted_at' => NULL),
            array('id' => '22','name' => 'Consulting & Accounting','code' => '615','coa_grandparents_id' => '3','coa_parents_id' => '12','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:23','updated_at' => '2022-01-11 11:32:23','deleted_at' => NULL),
            array('id' => '23','name' => 'Depreciation','code' => '700','coa_grandparents_id' => '3','coa_parents_id' => '12','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:24','updated_at' => '2022-01-11 11:32:24','deleted_at' => NULL),
            array('id' => '24','name' => 'General Expenses','code' => '628','coa_grandparents_id' => '3','coa_parents_id' => '12','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:24','updated_at' => '2022-01-11 11:32:24','deleted_at' => NULL),
            array('id' => '25','name' => 'Interest Income','code' => '460','coa_grandparents_id' => '4','coa_parents_id' => '13','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:25','updated_at' => '2022-01-11 11:32:25','deleted_at' => NULL),
            array('id' => '26','name' => 'Other Revenue','code' => '470','coa_grandparents_id' => '4','coa_parents_id' => '13','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:25','updated_at' => '2022-01-11 11:32:25','deleted_at' => NULL),
            array('id' => '27','name' => 'Purchase Discount','code' => '475','coa_grandparents_id' => '4','coa_parents_id' => '13','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:25','updated_at' => '2022-01-11 11:32:25','deleted_at' => NULL),
            array('id' => '28','name' => 'Sales','code' => '400','coa_grandparents_id' => '4','coa_parents_id' => '13','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:26','updated_at' => '2022-01-11 11:32:26','deleted_at' => NULL),
            array('id' => '29','name' => 'Common Stock','code' => '330','coa_grandparents_id' => '5','coa_parents_id' => '16','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:26','updated_at' => '2022-01-11 11:32:26','deleted_at' => NULL),
            array('id' => '30','name' => 'Owners Contribution','code' => '300','coa_grandparents_id' => '5','coa_parents_id' => '16','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:26','updated_at' => '2022-01-11 11:32:26','deleted_at' => NULL),
            array('id' => '31','name' => 'Owners Draw','code' => '310','coa_grandparents_id' => '5','coa_parents_id' => '16','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:26','updated_at' => '2022-01-11 11:32:26','deleted_at' => NULL),
            array('id' => '32','name' => 'Retained Earnings','code' => '320','coa_grandparents_id' => '5','coa_parents_id' => '16','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '1','created_at' => '2022-01-11 11:32:26','updated_at' => '2022-01-11 11:32:26','deleted_at' => NULL),
            array('id' => '34','name' => 'Cash','code' => '860','coa_grandparents_id' => '1','coa_parents_id' => '1','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '0','description' => NULL,'created_by' => '0','created_at' => '2022-06-04 12:09:02','updated_at' => '2022-06-04 12:09:02','deleted_at' => NULL),
            array('id' => '35','name' => 'Tuition Fee','code' => '859','coa_grandparents_id' => '4','coa_parents_id' => '13','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '0','description' => NULL,'created_by' => '0','created_at' => '2022-06-01 17:00:08','updated_at' => '2022-06-04 12:07:07','deleted_at' => NULL),
            array('id' => '38','name' => 'Application Fee','code' => '861','coa_grandparents_id' => '4','coa_parents_id' => '13','is_cashbook_item' => NULL,'is_enabled' => '1','is_delete' => '1','description' => NULL,'created_by' => '0','created_at' => '2022-09-10 17:30:35','updated_at' => '2022-09-10 17:30:35','deleted_at' => NULL)
        );
        COA::insert($coa);

        $coa_grandparents = array(
            array('id' => '1','coa_great_grandparents_id' => '1','name' => 'Assets','deleted_at' => NULL,'created_at' => '2022-01-11 11:32:15','updated_at' => '2022-01-11 11:32:15'),
            array('id' => '2','coa_great_grandparents_id' => '1','name' => 'Liabilities','deleted_at' => NULL,'created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17'),
            array('id' => '3','coa_great_grandparents_id' => '1','name' => 'Expenses','deleted_at' => NULL,'created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17'),
            array('id' => '4','coa_great_grandparents_id' => '1','name' => 'Income','deleted_at' => NULL,'created_at' => '2022-01-11 11:32:18','updated_at' => '2022-01-11 11:32:18'),
            array('id' => '5','coa_great_grandparents_id' => '1','name' => 'Equity','deleted_at' => NULL,'created_at' => '2022-01-11 11:32:18','updated_at' => '2022-01-11 11:32:18')
        );
        CoaGrandparent::insert($coa_grandparents);

        $coa_great_grandparents = array(
            array('id' => '1','name' => 'Balance Sheet Accounts','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '2','name' => 'Profit & Loss Accounts','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL)
        );
        CoaGreatGrandparent::insert($coa_great_grandparents);

        $coa_parents = array(
            array('id' => '1','coa_grandparents_id' => '1','name' => 'Current Asset','created_at' => '2022-01-11 11:32:15','updated_at' => '2022-01-11 11:32:15','deleted_at' => NULL),
            array('id' => '2','coa_grandparents_id' => '1','name' => 'Fixed Asset','created_at' => '2022-01-11 11:32:15','updated_at' => '2022-01-11 11:32:15','deleted_at' => NULL),
            array('id' => '3','coa_grandparents_id' => '1','name' => 'Inventory','created_at' => '2022-01-11 11:32:15','updated_at' => '2022-01-11 11:32:15','deleted_at' => NULL),
            array('id' => '4','coa_grandparents_id' => '1','name' => 'Non-current Asset','created_at' => '2022-01-11 11:32:16','updated_at' => '2022-01-11 11:32:16','deleted_at' => NULL),
            array('id' => '5','coa_grandparents_id' => '1','name' => 'Prepayment','created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17','deleted_at' => NULL),
            array('id' => '6','coa_grandparents_id' => '1','name' => 'Bank & Cash','created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17','deleted_at' => NULL),
            array('id' => '7','coa_grandparents_id' => '1','name' => 'Depreciation','created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17','deleted_at' => NULL),
            array('id' => '8','coa_grandparents_id' => '2','name' => 'Current Liability','created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17','deleted_at' => NULL),
            array('id' => '9','coa_grandparents_id' => '2','name' => 'Liability','created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17','deleted_at' => NULL),
            array('id' => '10','coa_grandparents_id' => '2','name' => 'Non-current Liability','created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17','deleted_at' => NULL),
            array('id' => '11','coa_grandparents_id' => '3','name' => 'Direct Costs','created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17','deleted_at' => NULL),
            array('id' => '12','coa_grandparents_id' => '3','name' => 'Expense','created_at' => '2022-01-11 11:32:17','updated_at' => '2022-01-11 11:32:17','deleted_at' => NULL),
            array('id' => '13','coa_grandparents_id' => '4','name' => 'Revenue','created_at' => '2022-01-11 11:32:18','updated_at' => '2022-01-11 11:32:18','deleted_at' => NULL),
            array('id' => '14','coa_grandparents_id' => '4','name' => 'Sales','created_at' => '2022-01-11 11:32:18','updated_at' => '2022-01-11 11:32:18','deleted_at' => NULL),
            array('id' => '15','coa_grandparents_id' => '4','name' => 'Other Income','created_at' => '2022-01-11 11:32:18','updated_at' => '2022-01-11 11:32:18','deleted_at' => NULL),
            array('id' => '16','coa_grandparents_id' => '5','name' => 'Equity','created_at' => '2022-01-11 11:32:19','updated_at' => '2022-01-11 11:32:19','deleted_at' => NULL)
        );
        CoaParent::insert($coa_parents);

    }
}
