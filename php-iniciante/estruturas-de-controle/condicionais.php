<?php 
//if (se)
//if(se) ... else (senão)
//if (se) ... else if (se não se) ... else (senão)
$numero = 30;
$numero1 = 400;
$numero2 = 32;

if($numero == 30 
   && $numero1 == 400 
   && $numero2 == 32) {
    print 'Valor é ' . $numero;
} 
// else if($numero == 31) {
//     print 'Valor é 31';
// }
// else if($numero == 32) {
//     print 'Valor é 32';
// }
else {
    print 'Valor não é 30';
}

print '<hr>';

//switch
switch($numero)
{
    case 30: 
        print 'Valor é ' . $numero;
    break;

    case 31: 
        print 'Valor é ' . $numero;
    break;

    case 32: 
        print 'Valor é ' . $numero;
    break;

    default:
        print 'Valor não encontrou um match...';
} 