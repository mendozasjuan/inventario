/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    $.get('dashboard/xhrGetListing',function(o){
        
        for (i=0; i < o.length; i++){
            $('.formulario').append('<div>' + o[i].texto + '<a class="del" rel="'+ o[i].id +'"href="">x</a></div>');
        }
        
         $('.del').live('click',function(){
            var delItem = $(this);
            var id= $(this).attr('rel');
             $.post('dashboard/xhrDeleteListing',{'id': id},function(o){
               // $('#listInserts').append('<div>' + o.texto + '<a class="del" rel="'+ o.id +'" href="">x</a></div>');
               delItem.parent().remove();
             },'json'); 
            return false;
         });
        
    },'json');
    
    
    $('.formulario').submit(function(){
       var url = $(this).attr('action');
       var data = $(this).serialize();
       $.post(url,data,function(o){
           $('.formulario').append('<div>' + o.texto + '<a class="del" rel="'+ o.id +'" href="">x</a></div>');
           
       },'json'); 
       return false; 
    });
    
   
});