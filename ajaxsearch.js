var req;

function Initialize()
{
    try
    {
        req=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e)
    {
        try
        {
            req=new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(oc)
        {
            req=null;
        }
    }


    if(!req&&typeof XMLHttpRequest!="undefined")
    {
        req = new XMLHttpRequest();
	}

}
function SendQuery(key)
{
    Initialize();
    
    var url="ajax.php?s="+key;

    if(req!=null)
    {
        req.onreadystatechange = Process;
        req.open("GET", url, true);
        req.send(null);

    }
}

function Process()
{
    if (req.readyState == 4)
    {
        if (req.status == 200)
        {
            if(req.responseText=="")
                HideDiv("autocomplete");
            else
            {
                ShowDiv("autocomplete");
                document.getElementById("autocomplete").innerHTML =req.responseText;
            }
        }
        else
        {
            document.getElementById("autocomplete").innerHTML=
				"Datalar yukleniyor:<br>"+req.statusText;
        }
    }
}

function ShowDiv(divid)
{
   if (document.layers) document.layers[divid].visibility="show";
   else document.getElementById(divid).style.display="inline";
}

function HideDiv(divid)
{
   if (document.layers) document.layers[divid].visibility="hide";
   else document.getElementById(divid).style.display="block";
}

function BodyLoad()
{
    HideDiv("autocomplete");
    document.form1.keyword.focus();
}
