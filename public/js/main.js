let table = document.getElementById('main-table');
let numberOfElements = 0;
//table.insertRow(4).outerHTML = '';
function insertRow(index, name , type, date_created, date_updated) {
    table.insertRow(index).outerHTML = `<tr id="row_${index}">
    <td class="row-number">${index}</td>
    <td>${name}</td>
    <td>${type}</td>
    <td>${date_created}</td>
    <td>${date_updated}</td>
    <td><button class="btn" onclick="deleteRow(${index})"><i class="fa fa-trash"></i></button>
    <button class="btn" data-toggle="modal" data-target="#myModal" onclick="addIndex(${index})"><i class="fas fa-pen-square"></i></button>
    </td>
    </tr>`;
}

function getDate() {
    let date = new Date(Date.now());
    return `${date.getDate()}/${date.getMonth()}/${date.getFullYear()}`;
}

function addIndex(index) {
    let div = document.createElement('div');
    div.setAttribute("id", index);
    div.setAttribute("class", "modal-index");
    document.getElementById('myModal').appendChild(div);
}

document.getElementById('saveImage').onclick = () => {
    let elements = document.getElementsByClassName("modal-index");
    let index = parseInt(elements[0].getAttribute('id'));
    let name = document.getElementById('name').value;
    elements[0].outerHTML = "";
    deleteRow(index);
    insertRow(index, name, 'video', name, name);    
};

document.getElementById('add-button').onclick = () => {
    numberOfElements++;
    insertRow(numberOfElements, 'New element', 'video', getDate(), getDate());
};

function openModal(index) {
    document.getElementById('exampleModal').modal();
}

function deleteRow(index) {
    document.getElementById("row_"+index+"").outerHTML="";
    //for updating the row number
    let elements = document.getElementsByClassName('row-number');
    for (let i = index - 1; i < elements.length; i++) {
        elements[i].innerHTML = `${i + 1}`;
    }
    numberOfElements--;
}



fetch('playlist.json')
.then(res => res.text())
.then(json => {
    data = JSON.parse(json);
    let i = 1;
    let date_created = data.date_created;
    let date_fetched = data.date_fetched;
    numberOfElements = data.playlist_items.length;
    data.playlist_items.forEach(element => {
        let name = element.url.split('/').pop();
        insertRow(i, name, fileType(name), date_created, date_fetched);
        i++;
    });
});

function fileType(file) {
    let extension = file.split('.').pop().toLowerCase();
    let types = {
        video : ["mp4", "avi", "mkv"],
        image : ["png", "jpg", "gif"]
    }
    if (types.video.indexOf(extension) != -1) {
        return 'video';
    }
    else if (types.image.indexOf(extension) != -1) {
        return 'image';
    }
    return 'other';
}


document.getElementById('my-awesome-dropzone').options.myAwesomeDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    accept: function(file, done) {
      if (file.name != "a.jpg") {
        done("Naha, you don't.");
      }
      else { done(); }
    }
  };