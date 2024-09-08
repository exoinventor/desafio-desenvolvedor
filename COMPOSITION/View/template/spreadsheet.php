<h2>STORAGE</h2>
<form actio="" method="post" id ="form" name="form" enctype="multipart/form-data">
<input type="file" name="file" id="file" />
</form>

<script>

const form = document.querySelector('form#form');
const submit = document.createElement('button');
submit.setAttribute('type','submit');
submit.setAttribute('id','submit');
submit.setAttribute('style','margin-top:15px;cursor:pointer;background-color:#f0f0f0;width:200px;height:25px;display:block;');
submit.innerHTML = 'Enviar';
form.appendChild(submit);
form.addEventListener('submit', async event => {

    event.preventDefault();

    const formData = new FormData(form);

    let domaiName = window.location.hostname;
    let domain = (domaiName == 'localhost') ? 'http://127.0.0.1/desafio-desenvolvedor' : 'https://' + domaiName;
    const apiUrl = domain + '/spreadsheet';

    const options = {
    method: 'POST',
    mode: 'cors', 
    body: formData /* GET/HEAD method cannot have body */
    };

    const response = await fetch(apiUrl, options);

    if (!response.ok) {
    const message = `An error has occured: ${response.status}`;
    throw new Error(message);
    }

    const view = await response.json();
    console.log('viewx:: ' + JSON.stringify(view, null, 1));
    /* const response = await sendFiles.json();
    console.log('response:: ' + JSON.stringify(response, null, 1));                         

    /* let dataFile = event.target;
    let files = dataFile.files;
    let fileCount = files.length;
    console.log('fileCount:: ' + fileCount);
   
    if(fileCount > 0)
    {
        for(let i = 0; i < fileCount; i++)
        {
            /* datas.append(('file-' + i).toString(), files[i], files[i].name); * /
            console.log('files tmp:: ' + JSON.stringify(files[i].tmp_name, null, 1));
            console.log('files name:: ' + JSON.stringify(files[i].name, null, 1));
            console.log('files type:: ' + JSON.stringify(files[i].type, null, 1));
            console.log('files size:: ' + JSON.stringify(files[i].size, null, 1));
            console.log('files error:: ' + JSON.stringify(files[i].error, null, 1));
        }      
    }       /** */
      
    });

</script>