<?php
/***
 * Função para remover acentos de uma string
 *
 * @autor Thiago Belem <contato@thiagobelem.net>
 * Ajustes realizado por Silvio Garbes
 * Versão 2015-09-02
 */
// http://blog.thiagobelem.net/removendo-acentos-de-uma-string-urls-amigaveis/
function removeAcentos($string, $slug = false) {
  // http://www.phpit.com.br/artigos/detectandodescobrindo-o-charsetcodificacao-de-uma-string-utf-8-iso-8859-1-etc.phpit
  if(mb_detect_encoding($string.'x', 'UTF-8, ISO-8859-1') == 'UTF-8'){
    $string = utf8_decode(strtolower($string));
  }
  $string = strtolower($string);

  // verificar codigo ascii de string
  //for($i=0;$i<strlen($string);$i++){
  //  echo $string[$i]." ";
  //  echo ord($string[$i]);
  //  echo "\n";
  //}

  // Código ASCII das vogais
  $ascii['a'] = range(224, 230);
  $ascii['e'] = range(232, 235);
  $ascii['i'] = range(236, 239);
  $ascii['o'] = array_merge(range(242, 246), array(240, 248));
  $ascii['u'] = range(249, 252);

  // Código ASCII dos outros caracteres
  $ascii['b'] = array(223);
  $ascii['c'] = array(231,199);
  $ascii['d'] = array(208);
  $ascii['n'] = array(241);
  $ascii['y'] = array(253, 255);
  $ascii['ra'] = array(170);

  foreach ($ascii as $key=>$item) {
    $acentos = '';
    foreach ($item AS $codigo) $acentos .= chr($codigo);
    $troca[$key] = '/['.$acentos.']/i';
  }

  $string = preg_replace(array_values($troca), array_keys($troca), $string);

  // Slug?
  if ($slug) {
    // Troca tudo que não for letra ou número por um caractere ($slug)
    $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
    // Tira os caracteres ($slug) repetidos
    $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
    $string = trim($string, $slug);
  }

  return $string;
}




?>