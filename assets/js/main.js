// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

function updateStatusColor(select , rowno) {
  var selectedOption = select.options[select.selectedIndex];
  var selectedColor = window.getComputedStyle(selectedOption, null).getPropertyValue('background-color');
  select.style.background = selectedColor;
  select.style.color = 'white';
  console.log("selectCalled");
  
  //updated form here
  const selectedValue = select.value;
  const url = `http://127.0.0.1/market/updateStatus.php?state=${selectedValue}&rowno=${rowno}`; // url ek wens krgnnn

    // Make the fetch request
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); 
        })
        .then(data => {
            console.log(data); 
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });

        console.log("fetch done");
}



list.forEach((item) => item.addEventListener("mouseover", activeLink));



// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

