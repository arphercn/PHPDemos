<?php
require_once('unit.php');
$unit = new unit;
$unit->run(TRUE,'is_true','test_TRUE_output_Passed');
$unit->run(FALSE,'is_true','test_FALSE_output_Failed');
$unit->run(TRUE,'is_false','test_TRUE_output_Failed');
$unit->run(FALSE,'is_false','test_FALSE_output_Passed');
echo $unit->report();