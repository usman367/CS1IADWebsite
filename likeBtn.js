
//This allows the user the user to like or unlikie an event by pressing the button
function changeColor(){
  //Get the button form html
  btn = document.getElementById("likebtn");

  //If the background colour is no green (e.g. they haven't liked it) then change it to green;
  if(btn.style.backgroundColor != "green"){
    btn.style.backgroundColor = "green";
  }
  //Othersie allow them to unlike the event by clicking it again (changing the colour back to red)
  else{
    btn.style.backgroundColor = "red";
  }

}
