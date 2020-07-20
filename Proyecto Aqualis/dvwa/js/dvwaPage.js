/* Help popup */

function popUp(URL) {
	day = new Date();
	id = day.getTime();
	window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=800,height=300,left=540,top=250');
	//eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=800,height=300,left=540,top=250');");
}

/* Form validation */

function validate_required(field,alerttxt)
{
with (field) {
  if (value==null||value=="") {
    alert(alerttxt);return false;
  }
  else {
    return true;
  }
 }
}

function validateGuestbookForm(thisform) {
with (thisform) {

  // Guestbook form
  if (validate_required(txtName,"El campo \"Nombre\" no puede estar vacío.")==false)
  {txtName.focus();return false;}
  
  if (validate_required(mtxMessage,"El campo \"Mensaje\" no puede estar vacío.")==false)
  {mtxMessage.focus();return false;}
  
  }
}

function confirmClearGuestbook() {
	return confirm("¿Estás seguro de que quieres vaciar el buzón?");
}
