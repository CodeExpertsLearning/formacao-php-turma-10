<?php

$nomes = [
    'Teste',
    'Teste 1',
    'Teste 2'
];


$pessoas = [
    [
        'nome' => 'Nanderson',
        'idade' => 29
    ],
    [
        'nome' => 'Teste',
        'idade' => 31
    ]
];

foreach($pessoas as $p)
{
    print $p['nome'] . ' têm ' . $p['idade'] . ' anos <br>';
}
die;

//foreach
foreach($nomes as $nome) {
    print $nome . '<br>';
}

print '<hr>';

//for
for($i = 0; $i < count($nomes); $i++) {
    print $nomes[$i] . '<br>';
}

print '<hr>';

//while
$i = 0;

while($i < count($nomes)) {
    print $nomes[$i] . '<br>';
    $i++;
}

print '<hr>';
//do...while
$i = 0;

do {
    print $nomes[$i] . '<br>';
    $i++;
} while($i < count($nomes));