<?php
function getSynonyms($word, $thesaurus) {
    if (isset($thesaurus[$word])) {
        $synonyms = $thesaurus[$word];
    } else {
        $synonyms = array();
    }
    $result = array(
        'word' => $word,
        'synonyms' => $synonyms
    );
    return json_encode($result);
}

$thesaurus = array("market" => array("trade"), "small" => array("little", "compact"));
echo getSynonyms("small", $thesaurus); 
echo getSynonyms("asleast", $thesaurus);