let AllAccordions = document.getElementsByClassName("AccordionHeader");
let AccordionTrigger = false;

for(let i = 0; i < AllAccordions.length; i++) {

    let ActualAccord = AllAccordions[i];
    let Accord_Son = ActualAccord.nextElementSibling;

    ActualAccord.addEventListener("click", function () {
        if(Accord_Son.classList.contains("AccordionDisabled"))
        {
            Accordion_KillExcept(i);
        }
    })
}



function Accordion_KillExcept(number) {
    if(AccordionTrigger == true){return;}
    AccordionTrigger = true;


    for (let i = 0; i < AllAccordions.length; i++) {
        let ActualAccordion = AllAccordions[i];
        let AccordionChild = ActualAccordion.nextElementSibling;

        if(i == number)
        {
            AccordionChild.classList.remove("AccordionDisabled");
            AccordionChild.classList.add("AccordionEnabled");
        }else
        {
            AccordionChild.classList.remove("AccordionEanbled");
            AccordionChild.classList.add("AccordionDisabled");
        }

        setTimeout(function () {
            AccordionTrigger = false;

        },700)






    }

}
