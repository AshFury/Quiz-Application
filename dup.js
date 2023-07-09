const form = document.querySelector('#inviteForm');
const input = document.querySelector('input');
const main = document.querySelector('.main');
const ul = document.querySelector('#invitedList');

/*
1. CREATE LI  -  IT IS SORTED
------------
*/ 
function createLi() {

    var linkElement = document.createElement("link");
    linkElement.rel = "stylesheet";
    linkElement.href = "styles.css";
    document.head.appendChild(linkElement);
  const li = document.createElement('li');
  const span0 = document.createElement('span');
  span0.textContent = document.getElementsByName("name")[0].value;
    //   const label = document.createElement('label');
    //   label.textContent = 'confirmed';
    li.appendChild(span0);
  //const div = document.createElement('div');
  const spanElement1 = document.createElement("span");
  spanElement1.textContent ="Option 1. " + document.getElementsByName("op1")[0].value;
  li.appendChild(spanElement1); 
  const spanElement2 = document.createElement("span");
  spanElement2.textContent = "Option 2. "+document.getElementsByName("op2")[0].value;
  li.appendChild(spanElement2); 
  const spanElement3 = document.createElement("span");
  spanElement3.textContent = "Option 3. "+ document.getElementsByName("op3")[0].value;
  li.appendChild(spanElement3); 
  const spanElement4 = document.createElement("span");
  spanElement4.textContent = "Option 4. "+document.getElementsByName("op4")[0].value;
  li.appendChild(spanElement4); 

  //const div1 = document.createElement('div');
  const tagcontent = document.createElement("span");
  tagcontent.textContent = "Tags: " + document.getElementsByName("tags")[0].value;
  li.appendChild(tagcontent);

  const ptss=document.createElement('span');
  var selectElement = document.getElementById("points");
  var selectedValue = selectElement.options[selectElement.selectedIndex].text;
  ptss.textContent = "Points: " + selectedValue;
  li.appendChild(ptss);

  const ctan=document.createElement('span');
  var selectElementctan = document.getElementById("crtans");
  var selectedValuectan = selectElementctan.options[selectElementctan.selectedIndex].text;
  ctan.textContent = "Correct Answer: " + selectedValuectan;
  li.appendChild(ctan);

  const dlvl=document.createElement('span');
  var selectElementdlvl = document.getElementById("difflvl");
  var selectedValuedlvl = selectElementdlvl.options[selectElementdlvl.selectedIndex].text;
  dlvl.textContent = "Difficulty level: " + selectedValuedlvl;
  li.appendChild(dlvl);

  const editBtn = document.createElement('button');
  editBtn.textContent = 'Edit';
  const removeBtn = document.createElement('button');
  removeBtn.textContent = 'Remove';

  li.appendChild(editBtn);
  li.appendChild(removeBtn);

  return li;
}

form.addEventListener('submit', (event) => {
  event.preventDefault();

  const li = createLi();
    ul.appendChild(li);
  
}); 

/*
3. Button actions
-----------------
*/ 
ul.addEventListener('click', (event) => {
  if(event.target.tagName === 'BUTTON') {
    const button = event.target;
    const li = button.parentNode;
    const ul = li.parentNode;
    if(button.textContent === 'Remove') {
      ul.removeChild(li);
    } 
    else if(button.textContent === 'Edit') {
       console.log(li.childNodes) 
      const span1 = li.childNodes[0];
      const input1 = document.createElement('input');
      input1.type = 'text';
      input1.value = span1.textContent;
      li.insertBefore(input1, span1);
      li.removeChild(span1);

      const span2 = li.childNodes[1];
      const input2 = document.createElement('input');
      input2.type = 'text';
      input2.value = span2.textContent.substr(10,span2.textContent.length -1);
      li.insertBefore(input2, span2);
      li.removeChild(span2);

      const span3 = li.childNodes[2];
      const input3 = document.createElement('input');
      input3.type = 'text';
      input3.value = span3.textContent.substr(10,span3.textContent.length -1);
      li.insertBefore(input3, span3);
      li.removeChild(span3);

      const span4 = li.childNodes[3];
      const input4 = document.createElement('input');
      input4.type = 'text';
      input4.value = span4.textContent.substr(10,span4.textContent.length -1);
      li.insertBefore(input4, span4);
      li.removeChild(span4);

      const span5 = li.childNodes[4];
      const input5 = document.createElement('input');
      input5.type = 'text';
      input5.value = span5.textContent.substr(10,span5.textContent.length -1);
      li.insertBefore(input5, span5);
      li.removeChild(span5);

      const span6 = li.childNodes[5];
      const input6 = document.createElement('input');
      input6.type = 'text';
      input6.value = span6.textContent.substr(6,span6.textContent.length -1);
      li.insertBefore(input6, span6);
      li.removeChild(span6);
        const brr = document.createElement('br')
      const span7 = li.childNodes[6];
      const disobj = document.createElement('option')
      const ptsel = document.createElement('select');
      const ptsel1 = document.createElement('option');
      const ptsel2 = document.createElement('option');
      const ptsel3 = document.createElement('option');
      const ptsel4 = document.createElement('option');

      disobj.value='Points';
      disobj.text='Points';
      disobj.disabled =true;
      
      ptsel1.value='1';
      ptsel1.text='1';
      ptsel2.value='2';
      ptsel2.text='2';
      ptsel3.value='3';
      ptsel3.text='3';
      ptsel4.value='5';
      ptsel4.text='5';
      ptsel.add(disobj,null);
      ptsel.add(ptsel1,null);
      ptsel.add(ptsel2,null);
      ptsel.add(ptsel3,null);
      ptsel.add(ptsel4,null);
      //ptsel.value = span6.textContent.substr(8,span6.textContent.length)
      li.insertBefore(ptsel,span7);
      li.removeChild(span7);
        
      const span8 = li.childNodes[7];
      const disobj1 = document.createElement('option')
      const opsel = document.createElement('select');
      const opsel1 = document.createElement('option');
      const opsel2 = document.createElement('option');
      const opsel3 = document.createElement('option');
      const opsel4 = document.createElement('option');

      disobj1.value='Correct Answer';
      disobj1.text='Correct Answer';
      disobj1.disabled = true;
      
      opsel1.value='opt1';
      opsel1.text='Option 1';
      opsel2.value='opt2';
      opsel2.text='Option 2';
      opsel3.value='opt3';
      opsel3.text='Option 3';
      opsel4.value='opt4';
      opsel4.text='Option 4';
      opsel.add(disobj1,null);
      opsel.add(opsel1,null);
      opsel.add(opsel2,null);
      opsel.add(opsel3,null);
      opsel.add(opsel4,null);
      //ptsel.value = span6.textContent.substr(8,span6.textContent.length)
      li.insertBefore(opsel,span8);
      li.removeChild(span8);

      const span9 = li.childNodes[8];
      const disobj2 = document.createElement('option')
      const dlsel = document.createElement('select');
      dlsel.name = "dlsel";
      const dlsel1 = document.createElement('option');
      const dlsel2 = document.createElement('option');
      const dlsel3 = document.createElement('option');
      const dlsel4 = document.createElement('option');

      disobj2.value='Difficulty Level';
      disobj2.text='Difficulty Level';
      disobj2.disabled = true;
      
      dlsel1.value='Easy';
      dlsel1.text='Easy';
      dlsel2.value='Medium';
      dlsel2.text='Medium';
      dlsel3.value='Hard';
      dlsel3.text='Hard';
      dlsel.add(disobj2,null);
      dlsel.add(dlsel1,null);
      dlsel.add(dlsel2,null);
      dlsel.add(dlsel3,null);
      //ptsel.value = span6.textContent.substr(8,span6.textContent.length)
      li.insertBefore(dlsel,span9);
      li.removeChild(span9);


      button.textContent = 'Save';
    } 
    else if(button.textContent === 'Save') {
        console.log(li.childNodes);
      const input1 = li.childNodes[0];
      const span1 = document.createElement('span');
      span1.textContent = input1.value;
      li.insertBefore(span1, input1);
      li.removeChild(input1);

      const input2 = li.childNodes[1];
      const span2 = document.createElement('span');
      span2.textContent = "Option 1. "+input2.value;
      li.insertBefore(span2, input2);
      li.removeChild(input2);

      const input3 = li.childNodes[2];
      const span3 = document.createElement('span');
      span3.textContent = "Option 2. "+input3.value;
      li.insertBefore(span3, input3);
      li.removeChild(input3);

      const input4 = li.childNodes[3];
      const span4 = document.createElement('span');
      span4.textContent = "Option 3. "+ input4.value;
      li.insertBefore(span4, input4);
      li.removeChild(input4);

      const input5 = li.childNodes[4];
      const span5 = document.createElement('span');
      span5.textContent = "Option 4. "+input5.value;
      li.insertBefore(span5, input5);
      li.removeChild(input5);

      const input6 = li.childNodes[5];
      const span6 = document.createElement('span');
      span6.textContent = "Tags: "+input6.value;
      li.insertBefore(span6, input6);
      li.removeChild(input6);

      const input7 = li.childNodes[6];
      const span7 = document.createElement('span');
      var selvali7= input7.options[input7.selectedIndex].text;
      span7.textContent = "Points: "+selvali7;
      li.insertBefore(span7, input7);
      li.removeChild(input7);

      const input8 = li.childNodes[7];
      const span8 = document.createElement('span');
      var selvali8= input8.options[input8.selectedIndex].text;
      span8.textContent = "Correct Answer: "+selvali8;
      li.insertBefore(span8, input8);
      li.removeChild(input8);

      const input9 = li.childNodes[8];
      const span9 = document.createElement('span');
      var selvali9= input9.options[input9.selectedIndex].text;
      span9.textContent = "Difficulty Level: "+selvali9;
      li.insertBefore(span9, input9);
      li.removeChild(input9);








      button.textContent = 'Edit';
    }
  }
});


