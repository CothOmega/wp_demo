<?php 
    // add desired font families and font weights below
    $explode_google_fonts = explode(',', get_theme_mod('google_fonts', 'Poppins,Noto Sans'));
    $font_weights = [300, 400, 500, 600, 700, 900];
    $font_fam_str = '';
    for ($i = 0; $i < count($explode_google_fonts); $i++) {
        $font_fam_str .= str_replace(' ', '+', $explode_google_fonts[$i]);
        for ($j = 0; $j < count($font_weights); $j++) {
            if ($j == 0) {
                $font_fam_str .= ':';
            }
            $comma = ',';
            if ($j == (count($font_weights) - 1)) {
                $comma = '';
            }
            $font_fam_str .= $font_weights[$j] . $comma;
        }
        if ($i !== (count($explode_google_fonts) - 1)) {
            $font_fam_str .= '|';
        }
    }
    $google_font_link = "<link href='https://fonts.googleapis.com/css?family=" . $font_fam_str . "&display=swap' rel='stylesheet'>";
    echo $google_font_link;
?>