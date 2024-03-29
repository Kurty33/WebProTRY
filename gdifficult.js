let boxes = document.querySelectorAll(".box");
let turn = "X";
let isGameOver = false;
let playerXWins = 0;
let playerOWins = 0;
let vsAI = false;
 
boxes.forEach(e => {
    e.innerHTML = "";
    e.addEventListener("click", () => {
        if (!isGameOver && e.innerHTML === "") {
            e.innerHTML = turn;
            Win();
            Draw();
            Turns();
            if (vsAI && !isGameOver && turn === "O") {
                makeAIMove();
            }
        }
    });
});
 
document.getElementById("choosePlayer").addEventListener("click", () => {
    vsAI = !vsAI;
    resetGame();
});
 
function resetGame() {
    isGameOver = false;
    turn = "X";
    document.querySelector(".bg").style.left = "0";
    document.querySelector("#results").innerHTML = "";
    document.querySelector("#play-again").style.display = "none";
 
    boxes.forEach(e => {
        e.innerHTML = "";
        e.style.removeProperty("background-color");
        e.style.color = "#fff";
    });
 
    if (vsAI && turn === "O") {
        makeAIMove();
    }
}
 
function Turns() {
    if (turn === "X") {
        turn = "O";
        document.querySelector(".bg").style.left = "85px";
    } else {
        turn = "X";
        document.querySelector(".bg").style.left = "0";
    }
}
 
function Win() {
    let winConditions = [
        [0, 1, 2, 3, 4, 5], [6, 7, 8, 9, 10, 11], [12, 13, 14, 15, 16, 17], [18, 19, 20, 21, 22, 23], [24, 25, 26, 27, 28, 29],
        [0, 6, 12, 18, 24], [1, 7, 13, 19, 25], [2, 8, 14, 20, 26], [3, 9, 15, 21, 27], [4, 10, 16, 22, 28], [5, 11, 17, 23, 29],
        [1, 6], [2, 7, 12], [3, 8, 13, 18], [4, 9, 14, 19, 24], [5, 10, 15, 20, 25], [11, 16, 21, 26], [17, 22, 27], [23, 28],
        [4, 11], [3, 10, 17], [2, 9, 16, 23], [1, 8, 15, 22, 29], [0, 7, 14, 21, 28], [6, 13, 20, 27], [12, 19, 26], [18, 25]
    ];
 
    for (let i = 0; i < winConditions.length; i++) {
        let values = winConditions[i].map(index => boxes[index].innerHTML);
        let isWin = values.every(value => value !== "" && value === values[0]);
 
        if (isWin) {
            isGameOver = true;
            document.querySelector(".turn-container").style.display = "none";
            document.querySelector(".opponent-toggle").style.display = "none";
            document.querySelector("#results").innerHTML = "Player " + turn + " wins!";
            document.querySelector("#play-again").style.display = "inline";
 
            // Update the scores
            if (turn === "X") {
                playerXWins++;
                document.querySelector("#player-x-count").innerHTML = playerXWins;
            } else {
                playerOWins++;
                document.querySelector("#player-o-count").innerHTML = playerOWins;
            }
           
            winConditions[i].forEach(index => {
                boxes[index].style.backgroundColor = "#08D9D6";
                boxes[index].style.color = "#000";
            });
 
            // Check if a player has won five games
            if (playerXWins === 5 || playerOWins === 5) {
                document.querySelector("#results").innerHTML =
                    playerXWins === 5 ? "Player X wins the game!" : "Player O wins the game!";
                document.querySelector("#play-again").style.display = "inline";
           
                // Reset the scoreboard when the game is won
                playerXWins = 0;
                playerOWins = 0;
                document.querySelector("#player-x-count").innerHTML = "0";
                document.querySelector("#player-o-count").innerHTML = "0";
            }
        }
    }
}
 
function Draw() {
    if (!isGameOver) {
        let isDraw = true;
        boxes.forEach(e => {
            if (e.innerHTML === "") isDraw = false;
        });
 
        if (isDraw) {
            isGameOver = true;
            document.querySelector(".turn-container").style.display = "none";
            document.querySelector(".opponent-toggle").style.display = "none";
            document.querySelector("#results").innerHTML = "Draw";
            document.querySelector("#play-again").style.display = "inline";
        }
    }
}
 
document.getElementById("choosePlayer").addEventListener("click", () => {
    vsAI = false;
    resetGame();
    document.getElementById("choosePlayer").classList.add("active");
    document.getElementById("chooseAI").classList.remove("active");
});
 
document.getElementById("chooseAI").addEventListener("click", () => {
    vsAI = true;
    resetGame();
    document.getElementById("chooseAI").classList.add("active");
    document.getElementById("choosePlayer").classList.remove("active");
 
    if (turn === "O") {
        makeAIMove();
    }
});
 
function makeAIMove() {
    const emptyBoxes = Array.from(boxes).filter(box => box.innerHTML === "");
 
    if (emptyBoxes.length > 0) {
        // Check for winning moves
        const winningMove = findWinningMove(emptyBoxes, "O");
        if (winningMove) {
            makeMove(winningMove);
        } else {
            // Check for blocking player's winning moves
            const blockingMove = findWinningMove(emptyBoxes, "X");
            if (blockingMove) {
                makeMove(blockingMove);
            } else {
                // Make a strategic move if no winning or blocking moves
                const strategicMove = findStrategicMove(emptyBoxes);
                makeMove(strategicMove);
            }
        }
    }
}
 
function makeMove(move) {
    if (move) {
        move.innerHTML = "O";
        Win();
        Draw();
        Turns();
    }
}
 
function findStrategicMove(emptyBoxes) {
    // Prioritize center if available
    const centerBox = emptyBoxes.find(box => box.dataset.row === "2" && box.dataset.col === "2");
    if (centerBox) {
        return centerBox;
    }
 
    // Prioritize corners
    const cornerBoxes = emptyBoxes.filter(
        box => (box.dataset.row % 2 === 0 && box.dataset.col % 2 === 0) || (box.dataset.row === "2" && box.dataset.col === "2")
    );
    if (cornerBoxes.length > 0) {
        return cornerBoxes[0];
    }
 
    // Choose a random empty box as a fallback
    const randomIndex = Math.floor(Math.random() * emptyBoxes.length);
    return emptyBoxes[randomIndex];
}
 
function findWinningMove(emptyBoxes, player) {
    for (const box of emptyBoxes) {
        box.innerHTML = player;
 
        if (checkWin(player)) {
            box.innerHTML = "";
            return box;
        }
 
        box.innerHTML = "";
    }
 
    return null;
}
 
function checkWin(player) {
    let winConditions = [
        [0, 1, 2, 3, 4, 5], [6, 7, 8, 9, 10, 11], [12, 13, 14, 15, 16, 17], [18, 19, 20, 21, 22, 23], [24, 25, 26, 27, 28, 29],
        [0, 6, 12, 18, 24], [1, 7, 13, 19, 25], [2, 8, 14, 20, 26], [3, 9, 15, 21, 27], [4, 10, 16, 22, 28], [5, 11, 17, 23, 29],
        [1, 6], [2, 7, 12], [3, 8, 13, 18], [4, 9, 14, 19, 24], [5, 10, 15, 20, 25], [11, 16, 21, 26], [17, 22, 27], [23, 28],
        [4, 11], [3, 10, 17], [2, 9, 16, 23], [1, 8, 15, 22, 29], [0, 7, 14, 21, 28], [6, 13, 20, 27], [12, 19, 26], [18, 25]
    ];
 
    for (let i = 0; i < winConditions.length; i++) {
        let values = winConditions[i].map(index => boxes[index].innerHTML);
        let isWin = values.every(value => value !== "" && value === player);
 
        if (isWin) {
            ;
 
       
            return true;
        }
    }
 
   
    return false;
}
 
document.querySelector("#play-again").addEventListener("click", () => {
    isGameOver = false;
    turn = "X";
    document.querySelector(".turn-container").style.display = "grid";
    document.querySelector(".opponent-toggle").style.display = "flex";
    document.querySelector(".bg").style.left = "0";
    document.querySelector("#results").innerHTML = "";
    document.querySelector("#play-again").style.display = "none";
 
    boxes.forEach(e => {
        e.innerHTML = "";
        e.style.removeProperty("background-color");
        e.style.color = "#fff";
    });
});