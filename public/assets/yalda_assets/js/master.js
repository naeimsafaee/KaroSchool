const starContainer = document.getElementById("star-container");

//Math.seedrandom("CDR");
let stars = ["✦", "✧", "★", "✬", "✯", "✴", "✵", "✶", "✷", "✹", "✸"];


for (let i = 0; i < 100; i++) {
    const element = document.createElement("div");
    element.style.top = `${Math.random() * 100}%`;
    element.style.left = `${Math.random() * 100}%`;
    let sizeX = Math.random() * 5 +
        10;
    let sizeY = ~~(Math.random() * 3) + 10;
    //element.style.width = `${sizeX}px`;
    //element.style.height = `${sizeX}px`;
    element.innerHTML = stars[~~(Math.random() * stars.length)];
    element.style.fontSize = sizeX + "px";
    element.style.animation = `${20000 / sizeX + Math.random() * (8000 / sizeX)
    }ms linear ${Math.random() * 7000}ms alternate infinite twinkle`;
    starContainer.appendChild(element);
    element.setAttribute("class", "star");
}
