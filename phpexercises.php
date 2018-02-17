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
grab some function from the universe and make the key part, (**)by reflection how key operates in the universe can crosscut the universe by using annotation where external parts influences the universe,
of the universe in which operates;

(**) This was a second time look of the sentences, and thought of possible inception and induced.
