php

$a=[1,2,3];
$b=[1,2];
$c=[1];
$d=[$a,$b,$c];

Given array_diff($a,$b) produces 3, How to array_diff knowing $d only?



Using get the counts of $d;
Using reflection to tap into handler for array_diff();
for each handler of $d passing the handle as a parameter for array_diff(); so that the generated code would look like. This is a hard problem


$d=['a'=>[1,2,3],'b'=>[1,2],'c'=>[1]];
now using extract($d) it will create $a, $b, $c;
now using reflection and generate the following code;
array_diff($a,$b,$c);

scope(keys meant to be data);
promote keys into global, the space in which universe operates;
*** grab some function from the universe and make the key part, (**)by reflection how key operates in the universe can crosscut the universe by using annotation where external parts influences the universe,
of the universe in which operates;

(**) This was a second time look of the sentences, and thought of possible inception and induced.


----- solution 1

$d=['a'=>[1,2,3],'b'=>[1,2],'c'=>[1]];
$refFunc = new ReflectionFunction('array_diff');
$values = array_values($d);
var_dump($refFunc->invokeArgs($values));

The actual code that make it work is.

-----
*** looking at the solution 1, in conjunction with making the key part, php can run the code like this
array_diff($a,$b,$c);
It will work nice if was in a template language. or Language within Language.
$d=['a'=>[1,2,3],'b'=>[1,2],'c'=>[1]];
$scope = wrap(extract($d));
HighReflect{
   $refFunc = new ReflectionFunction('array_diff');
   var_dump($refFunc->invokeArgs($scope));
}
This way, I am treating the calling of the function as its parameter key rather as its value.
