function check() 
{
    var len = document.querySelectorAll('input[type="checkbox"]:checked').length
    if(len > 0 && len < 6)
    {
        document.forms[0].action='downloadPdf.php';
        document.forms[0].submit()    
    }
    else
    {
        alert('Please Select At Least 1 Field!\n\t\tAND\nPlease Select At Max 5 Fields!')
    }
}