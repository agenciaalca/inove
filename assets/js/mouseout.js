$( "div.overout" )
  .mouseout(function() {
    $( ".in", this ).text( "" );
  })
  .mouseover(function() {
    $( ".in", this ).html( "<div><img src='http://simpleicon.com/wp-content/uploads/smile-256x256.png'><p> Texto mostrado Texto mostrado Texto mostrado Texto mostrado Texto mostrado Texto mostradoTexto mostradoTexto mostrado</p></div>" );
    
  });
 




//function serviceOver(paramOver) {
//
//    if ((paramOver) === 10) {
//        (paramOver).innerHTML = "<div class='col-md-6 saida-js'><img src='/assets/imagens/service.png'><p>Texto mostrado</p></div>";
//    } else if ((paramOver) === 10) {
//        (paramOver).innerHTML = "<div class='saida-js'><img src='/assets/imagens/service.png'><p>Texto mostrado</p></div>";
//    } else if ((paramOver) === 20) {
//        (paramOver).innerHTML = "<div class='saida-js'><img src='/assets/imagens/service.png'><p>Texto mostrado</p></div>";
//    } else if ((paramOver) === 30) {
//        (paramOver).innerHTML = "<div class='saida-js'><img src='/assets/imagens/service.png'><p>Texto mostrado</p></div>";
//    } else if ((paramOver) === 40) {
//        (paramOver).innerHTML = "<div class='saida-js'><img src='/assets/imagens/service.png'><p>Texto mostrado</p></div>";
//    } else if ((paramOver) === 50) {
//        (paramOver).innerHTML = "<div class='saida-js'><img src='/assets/imagens/service.png'><p>Texto mostrado</p></div>";
//    } else {
//        (paramOver).innerHTML = "<div class='saida-js'><img src='/assets/imagens/service.png'><p>Texto mostrado</p></div>";
//    }
//}
//
//function serviceOut(paramOut) {
//
//    if (paramOut === 01) {
//        paramOut.innerHTML = "Armazendamneto";
//    } else if (paramOut === 02) {
//        paramOut.innerHTML = "Armazendamneto";
//    } else if (paramOut === 03) {
//        paramOut.innerHTML = "Armazendamneto";
//    } else if (paramOut === 04) {
//        paramOut.innerHTML = "Armazendamneto";
//    } else if (paramOut === 05) {
//        paramOut.innerHTML = "Armazendamneto";
//    } else if (paramOut === 06) {
//        paramOut.innerHTML = "Armazendamneto";
//    }else{
//        paramOut.innerHTML = "deu ruim";
//    }
//
//
//}

