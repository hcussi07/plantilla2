$(document).on("ready", inicioS);
function inicioS() {
    icontadorS("lema-serv","cl1",250,"clv");
    
    icontadorS("serv-1","cs1",30,"cs1v");
    icontadorS("sdesc-1","cd1",250,"cd1v");
    
    icontadorS("serv-2","cs2",30,"cs2v");
    icontadorS("sdesc-2","cd2",250,"cd2v");
    
    icontadorS("serv-3","cs3",30,"cs3v");
    icontadorS("sdesc-3","cd3",250,"cd3v");
    
    icontadorS("serv-4","cs4",30,"cs4v");
    icontadorS("sdesc-4","cd4",250,"cd4v");
    
    icontadorS("serv-5","cs5",30,"cs5v");
    icontadorS("sdesc-5","cd5",250,"cd5v");
    
    icontadorS("serv-6","cs6",30,"cs6v");
    icontadorS("sdesc-6","cd6",250,"cd6v");
    
    panelS();
    adminpanelS();

    verResultadoS("serv-1","sv1");
    verResultadoS("serv-2","sv2");
    verResultadoS("serv-3","sv3");
    verResultadoS("serv-4","sv4");
    verResultadoS("serv-5","sv5");
    verResultadoS("serv-6","sv6");

    verResultadoS("sdesc-1","sd1");
    verResultadoS("sdesc-2","sd2");
    verResultadoS("sdesc-3","sd3");
    verResultadoS("sdesc-4","sd4");
    verResultadoS("sdesc-5","sd5");
    verResultadoS("sdesc-6","sd6");

    verResultadoS("lema-serv","lema_out");

    verImagen("img-ser1","img_out_1");
    verImagen("img-ser2","img_out_2");
    verImagen("img-ser3","img_out_3");
    verImagen("img-ser4","img_out_4");
    verImagen("img-ser5","img_out_5");
    verImagen("img-ser6","img_out_6");

    $("#slogan").on("click", function(){funcPop("pop_lema");});

    $("#servs1").on("click", function(){funcPop("pop_serv1");});
    $("#servs2").on("click", function(){funcPop("pop_serv2");});
    $("#servs3").on("click", function(){funcPop("pop_serv3");});
    $("#servs4").on("click", function(){funcPop("pop_serv4");});
    $("#servs5").on("click", function(){funcPop("pop_serv5");});
    $("#servs6").on("click", function(){funcPop("pop_serv6");});

    openDialog("pop_lema",350);
    openDialog("pop_serv1",450);
    openDialog("pop_serv2",450);
    openDialog("pop_serv3",450);
    openDialog("pop_serv4",450);
    openDialog("pop_serv5",450);
    openDialog("pop_serv6",450);
}