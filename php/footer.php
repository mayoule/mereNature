<div id="footer">
    <p>Informations
    </p>
    <p><strong>FunGi</strong>
    </p>
    <p><em>Mère Nature</em>;
    </p>
    <?php
         $translate_day=array("Monday"=>"Lundi","Tuesday"=>"Mardi","Wednesday" => "Mercredi","Thursday"=>"Jeudi","Friday"=>"Vendredi","Saturday"=>"Samedi","Sunday"=>"Dimanche");
         $translate_month = array("January" => 'Janvier',"February" => 'Février',"March" => 'Mars', "April" => 'Avril',"May" => 'Mai', "June" => 'Juin', "July" =>'Juillet', "August" => 'Août',"September" => 'Septembre', "October" => 'Octobre', "November"=> 'Novembre', "December" => "Décembre");
         echo "<p class='important'> Nous sommes le ".$translate_day[date("l")]." ".date("d")." ".$translate_month[date("F")]."</p>";
    
    ?>
</div>