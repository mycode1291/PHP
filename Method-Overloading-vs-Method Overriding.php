1. Method overloading
<?php
// Method overloading allows the creation of several methods with the same name which differ from each other in the type of the input.


   class Sum {

    public function getSum() {
   
     $args = func_get_args();
       print_r($args);
        if (empty($args)) return 0;
       $sum = 0;
        foreach ($args as $arg) {
            $sum += $arg;
        }

        return $sum;
    }
}

$s = new Sum();
echo $s->getSum() . "\n" ;
echo $s->getSum(5) . "\n" ;
echo $s->getSum(3, 4) . "\n" ;
echo $s->getSum(3, 4, 7) . "\n" ;

?>

2. Method Overriding
<?php
 //Overriding is only pertinent to derived classes, where the parent class has defined a method and the derived class wishes to override that method.

//if

class parentclass {
    function name() {
        return 'Parent';
    }
}

class childclass extends parentclass {
    function name() {
        return 'Child';
    }
}

$obj = new childclass();
echo $obj->name();
 //It called child function instead of parent parent function - Overriding Example

?>
Posted by Manish at 23:52 
