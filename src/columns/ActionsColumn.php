<?php

namespace mimicreative\datatables\columns;


use yii\base\Object;
use yii\helpers\Html;
use yii\web\JsExpression;

class ActionsColumn extends Object {

  public $searchable = false;
  public $orderable  = false;
  public $render     = null;
  public $width      = '20%';
  public $title      = 'Actions';
  public $data       = 'actions';
  public $className  = 'actions-column';

  public function init() {

    if ($this->render === null) {
      $this->render = new JsExpression('
        function(data, type, row, meta) {
          var links = jQuery("<div/>");
          
          for(var i = 0; i < data.length; i++) {
            console.log(data[i]);
            var btnData = data[i];
            var link = jQuery("<a>" + btnData.label + "</a>");
            link.attr("href", btnData.url);
            link.addClass("btn " + btnData.class);
            
            links.append(link);
            links.append(" ");
          }
          
          if(type === "display") {
            console.log(links);
          
            return links.html();
          }
          
          return null;
        }
      ');
    }
  }
}
