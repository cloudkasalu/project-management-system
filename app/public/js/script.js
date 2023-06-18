// Sidebar toggle button


// Assuming the URL is: https://example.com/?var1=value1&var2=value2

// Get the search parameters from the current URL
const urlParams = new URLSearchParams(window.location.search);

// Get the value of a specific variable
const var1Value = urlParams.get('id');
console.log(var1Value); // Output: "value1"





let tasks;

const data = async () => {
  try{
      let response =  await fetch(
          `http://127.0.0.1/portfolio/projects`
      )
      let filteredWorks = await response.json();

      displayWorks = ()=>{

          worksContainer.innerHTML = filteredWorks.slice(0,5)
          .map((work)=>{
              const{id,title,category,image} = work;
              return `
                    <div class="work" data-id="${id}">
                    <div class="image-container">
                        <img src="data:image/webp;base64,${image.src}" alt="${image.alt}">
                    </div>
                    </div>
                    `      
          })
          .join('');
          
          }
        
          console.log(filteredWorks);
          displayWorks();
          
          const categoryDOM = document.querySelector('.category');
          
          
          const displayButtons =()=>{
              const buttons = [
                  'all',
                  ...new Set(works.map((work)=>work.category)),
              ];
          
              categoryDOM.innerHTML= buttons
              .map((category)=>{
                  return `<button class="work-category" data-id="${category}">${category}</button>`;
              }).join('');
          
          }
          displayButtons();
          
          categoryDOM.addEventListener('click', (e)=>{
              const el = e.target;
              if(el.classList.contains('work-category')){
                  if(el.dataset.id === 'all'){
                      filteredWorks = [...works];
                  }else{
                      filteredWorks = works.filter((work)=>{
                          return work.category === el.dataset.id;
                      });
                  }
                  displayWorks();
              }
          })

  }catch(err){
      console.log(err)
  }

}
data();




const worksContainer = document.querySelector('.works-grid')












// const sidebarToggleBtn = document.querySelector('.sidebar-toggle');
// sidebarToggleBtn.addEventListener('click', function() {
//   document.querySelector('.app').classList.toggle('sidebar-open');
// });


// document.getElementById("add-project-btn").addEventListener("click", function() {
//   window.location.href = "add-project.html";
// });

// document.getElementById("cancel-project-btn").addEventListener("click", function() {
//   window.location.href = "index.html";
// });
