const observer = new IntersectionObserver((entries) =>{
	entries.forEach((entry) => {
		console.log(entry)
		if (entry.isIntersecting) {
			entry.target.classList.add('show');
		}
	});
});

const hiddenElemenets = document.querySelectorAll('.hidden');
hiddenElemenets.forEach((el) => observer.observe(el));

function Scrollh() {
const id = 'h';
const yOffset = -55; 
const element = document.getElementById("h");
const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

window.scrollTo({top: y, behavior: 'smooth'});
}
function Scrolla() {
const id = 'a';
const yOffset = -55; 
const element = document.getElementById("a");
const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

window.scrollTo({top: y, behavior: 'smooth'});
}
function Scrolls() {
const id = 's';
const yOffset = -55; 
const element = document.getElementById("s");
const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

window.scrollTo({top: y, behavior: 'smooth'});
}
function Scrollm() {
 const id = 'm';
const yOffset = -55; 
const element = document.getElementById("m");
const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

window.scrollTo({top: y, behavior: 'smooth'});
}

 