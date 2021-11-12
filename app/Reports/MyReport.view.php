<?php 
        \koolreport\widgets\google\AreaChart::create(array(
            "dataStore"=>$this->dataStore('results'),
            "width"=>"100%",
            "height"=>"500px",
            "columns"=>array(
                "date_only"=>array(
                    "label"=>"id"
                ),
        "id"=>array(
                    "type"=>"number",
                    "label"=>"No. of SMS",
                    "prefix"=>"$",
                    "emphasis"=>true
                )
            ),
            "options"=>array(
                "title"=>" SMS Sent Per day",
            )
        ));

        ?>
  