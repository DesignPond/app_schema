<?php
if(!empty($new)){

    $subthemes = Subtheme::all()->lists('schemas','id');

    foreach($subthemes as $id => $subtheme){
        $sub[$id] = explode(',',$subtheme);
    }


    function searchInSub($number,$sub)
    {
        foreach($sub as $id => $subthemes)
        {
           if(in_array($number,$subthemes))
           {
               return $id;
           }
        }
    }


    foreach($new as $id => $file)
    {

        $file = str_replace('.eps','',$file);
        $file = str_replace('temp/','',$file);

        // get (number)
        $regex = '/^.*?\(([^\)]+)\)/';
        if (preg_match_all($regex, $file ,$matches))
        {
            $number = implode(' ', $matches[1]);

            $newnames[$number]['subtheme_id'] = searchInSub($number,$sub);
        }

        // get title and theme
        $output = preg_split( "/\(([^\)]+)\)/", $file , 2);
        $theme  = trim($output[0]);
        $theme  = str_replace('.','',$theme);

        $newnames[$number]['theme_id'] = $theme;
        $newnames[$number]['titre'] = trim($output[1]);
        $newnames[$number]['categorie_id'] = 1;

    }

    ksort($newnames);
    echo '<pre>';
    print_r($newnames);
    echo '</pre>';

    $custom = new \Custom;
/*
  foreach($newnames as $projet)
    {
        // Create the article
        $projet = Projet::create(array(
            'titre'       => $projet['titre'],
            'categorie_id'=> $projet['categorie_id'],
            'theme_id'    => $projet['theme_id'],
            'subtheme_id' => $projet['subtheme_id'],
            'type'        => 'pdf',
            'status'      => 'actif',
            'slug'        => $custom->makeSlug($projet['titre'])
        ));

    }*/


}

?>


