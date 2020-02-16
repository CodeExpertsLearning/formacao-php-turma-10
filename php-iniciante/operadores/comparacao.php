<?php

/*
 * == (igual a), === (igual a, testando pelo tipo)
 * != (não igual), !== (não igual, testando pelo tipo)
 * <> (diferente)
 * > (maior que), < (menor que), 
 * >= (maior ou igual), <=  (menor ou igual)
 * <=> (spaceship operator)
 */

//  print 10 <= '10';
 /*
 * <=> (spaceship operator)
 */

print 10 <=> 10; // 0: esquerda igual a direita
print '<hr>';
print 9 <=> 10; // -1: esquerda menor que a direita
print '<hr>';
print 10 <=> 9; // 1: esquerda maior que a direita
print '<hr>';

