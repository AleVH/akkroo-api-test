<?php
declare(strict_types=1);

//spl_autoload_register(function ($class) {
//    include '\src\\' . $class . 'php';
//});

use PHPUnit\Framework\TestCase;
use Src\Entities\Lead;

final class AkkrooApiEntityTest extends TestCase
{

//    public function testRouterController(){
//
//    }
//
//    /**
//     * Basic test to check the class type
//     * @dataProvider leadSampleData
//     */
//    public function testClassType($first_name, $last_name, $email, $accept_terms, $company, $post_code): void {
//        $this->assertInstanceOf(Lead::class, new Lead($first_name, $last_name, $email, $accept_terms, $company, $post_code));
//    }
//
//    /**
//     * Sample data
//     * @return array
//     */
//    public function leadSampleData(){
//        $lead_data_examples = array(
//            array("Ale", "VH", "alevh@gmail.com", true, "Emporio VH", "SE19 2AJ"),
//            array("Odessa", "Potter", "at.auctor.ullamcorper@ultrices.ca", true, "Elit Pretium Ltd", "3579"),
//            array("Cameron", "Barr", "ac@egetmetuseu.co.uk", true, "Varius Orci In Inc.", "A9G 9G8"),
//            array("Yoshi", "Conrad", "Suspendisse.aliquet.molestie@pedesagittisaugue.com", true, "Maecenas Consulting", "986432"),
//            array("Lawrence", "Daniel", "libero@semconsequatnec.org", true, "Neque Venenatis Company", "Y9J 7S0")
//        );
//        return $lead_data_examples;
//    }




//    /**
//     * @dataProvider invalidAmounts
//     */
//    public function testCantBeCreatedFromInvalidAmount($term, $amount): object {
//        $calculator = new FeeCalculator();
//        $invalid_test = new LoanApplication($term, $amount);// this is the invalid amount
//        $this->expectException(Exception::class);
//        $this->assertInstanceOf(FeeCalculator::class, $calculator->calculate($invalid_test));
//        return $calculator;
//    }
//
//    public function invalidAmounts(){
//        $data = array(
//            array(12,999),
//            array(24,20001),
//            array(12, 20000.1)
//        );
//        return $data;
//    }
//
//    /**
//     * @dataProvider termsPossibilities
//     */
//    public function testGetsTheCorrectFeeTerm($term, $term_fee):array {
//        $fee_calc = new FeeCalculator();
//        $this->assertEquals($term_fee, $this->invokeMethod($fee_calc, 'findFee', array($term)));
//        return $term_fee;
//    }
//
//    public function termsPossibilities(){
//        $data = array(
//            array(12, $this->annualTerm()),
//            array(24, $this->biannualTerm()),
//            array(6, $this->annualTerm()),
//            array(36, $this->annualTerm())
//        );
//        return $data;
//    }
//
//    /**
//     * @dataProvider randomValidExamples
//     */
//    public function testGetsCorrectRoofAndFloor($fee_term, $amount): void {
//        $fee_calc = new FeeCalculator();
//        if($fee_term == 24){
//            $fee_term_array = $this->biannualTerm();
//        }else{
//            $fee_term_array = $this->annualTerm();
//        }
//
//        $get_roof_and_top = $this->invokeMethod($fee_calc, 'getRoofAndFloor', array($fee_term_array, $amount));
//
//        $this->assertArrayHasKey('fee_roof', $get_roof_and_top);
//        $this->assertArrayHasKey('amount_roof', $get_roof_and_top);
//        $this->assertArrayHasKey('fee_floor', $get_roof_and_top);
//        $this->assertArrayHasKey('amount_floor', $get_roof_and_top);
//
//        // this if is to prevent comparison if roof and floor are the same or in other words, when it lands on a breakpoint
//        if($get_roof_and_top['amount_roof'] != $get_roof_and_top['amount_floor']){
//            $this->assertGreaterThan($amount, $get_roof_and_top['amount_roof']);
//            $this->assertLessThan($amount, $get_roof_and_top['amount_floor']);
//        }else{
//            $this->assertEquals($amount, $get_roof_and_top['amount_roof']);
//            $this->assertEquals($amount, $get_roof_and_top['amount_floor']);
//        }
//    }
//
//    public function randomValidExamples(){
//        $data = array(
//            array(12,1000),
//            array(12,5237),
//            array(24,1001),
//            array(12,15450),
//            array(24,9393),
//            array(12,19250),
//            array(12,20000)
//        );
//        return $data;
//    }
//
//    /**
//     * Call protected/private method of a class.
//     *
//     * @param object &$object    Instantiated object that we will run method on.
//     * @param string $methodName Method name to call
//     * @param array  $parameters Array of parameters to pass into method.
//     *
//     * @return mixed Method return.
//     */
//    public function invokeMethod(&$object, $methodName, array $parameters = array()) {
//        $reflection = new ReflectionClass(get_class($object));
//        $method = $reflection->getMethod($methodName);
//        $method->setAccessible(true);
//
//        return $method->invokeArgs($object, $parameters);
//    }
//
//
//    public function biannualTerm(){
//
//        return array(
//            1000 => 70,
//            2000 => 100,
//            3000 => 120,
//            4000 => 160,
//            5000 => 200,
//            6000 => 240,
//            7000 => 280,
//            8000 => 320,
//            9000 => 360,
//            10000 => 400,
//            11000 => 440,
//            12000 => 480,
//            13000 => 520,
//            14000 => 560,
//            15000 => 600,
//            16000 => 640,
//            17000 => 680,
//            18000 => 720,
//            19000 => 760,
//            20000 => 800
//        );
//    }
}
