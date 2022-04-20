const createElement = (element, typeAtt, valueAtt, value) => {
  const tagElement = document.createElement(element);
  if (valueAtt != null) {
    tagElement.setAttribute(typeAtt, valueAtt);
  }
  if(value != null) {
    tagElement.innerHTML = value;
  }
  return tagElement;
};

const printValue = (value1, value2, element) => {
  element.innerHTML = `${value1} - ${value2}`;
};

const addBackground = (i, y, tableTd) => {
    if ((i % 2) == 0) {
        if ((y % 2) == 0) {
            tableTd.setAttribute('class', 'tdBlue');
        }
    }
    if ((i % 3) == 0) {
        if ((y % 3) == 0) {
            tableTd.setAttribute('class', 'tdGreen');
        }
    }
}
 
const appendTable = () => {
  const table = createElement("table", "id", "table");
  const caption = createElement("caption", null, null, "Tabla");

  const mainDiv = document.getElementById("main");
  mainDiv.appendChild(table);
  table.appendChild(caption);

  for (let i = 1; i <= 10; i++) {
    const tableRow = createElement("tr");

    for (let y = 1; y <= 10; y++) {
      const tableTd = createElement("td");
      printValue(i, y, tableTd);
      addBackground(i, y, tableTd);
      tableRow.appendChild(tableTd);
    }
    table.appendChild(tableRow);
  }
};

const removeTable = () => {
  const elem = document.getElementById("table");
  elem.remove();
};

document.getElementById("createTable").addEventListener("click", appendTable);
document.getElementById("deleteTable").addEventListener("click", removeTable);