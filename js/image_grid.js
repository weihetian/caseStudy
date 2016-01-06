$( function() {



  load();


});



  var $container = $('.case_area').masonry({
    itemSelector: '.block',
    columnWidth: '.block'
  });


  var counter = 0;

  function load(){


     var $items = getItems();
     // hide by default
     $items.hide();
     // append to container
     $container.append( $items );
     $items.imagesLoaded().progress( function( imgLoad, image ) {
       // get item
       // image is imagesLoaded class, not <img>
       // <img> is image.img
       var $item = $( image.img ).parents('.block');
       // un-hide item
       $item.show();
       // masonry does its thing
       $container.masonry( 'appended', $item ).masonry();
     });


  }



function randomInt( min, max ) {
  return Math.floor( Math.random() * max + min );
}


function randomInt( min, max ) {
  return Math.floor( Math.random() * max + min );
}


//Get Items needs to be replaced by Json
function getItem() {
  var width = randomInt(200,400);
  var height =randomInt(300,500);
  var item = '<div class="block"><div class="inner_block"><div class="block_img">'+
    '<img src="http://lorempixel.com/' +
      width + '/' + height + '/technics" /></div>'+'<div class="block_content">some content here</div>'+
      '<div class="block_footer">foot is here</div></div></div>';
  return item;
}

function getItems() {
  var items = '';
  for ( var i=0; i < 12; i++ ) {
    items += getItem();
  }
  // return jQuery object
  return $( items );
}

function enlarge(url){
  alert();
}
