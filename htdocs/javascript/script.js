wbtn = document.getElementById('w_btn');
wbtn.addEventListener('click', function (){
  document.getElementById('target').className='white';
  document.getElementById('mainlink').className='white';

})

bbtn = document.getElementById('b_btn');
bbtn.addEventListener('click', function (){
  document.getElementById('target').className='black';
  document.getElementById('mainlink').className='black';
})
