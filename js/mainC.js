$(document).on("ready", inicioC);
function inicioC() {

    icontadorS("inv-cont","contador",200,"cant_inv");

    panelS();
    adminpanelS();
    verResultadoS("inv-cont","inv_out");
    $("#mensaje").on("click", function(){funcPop("pop_inv");});

    openDialog("pop_inv",350);
}