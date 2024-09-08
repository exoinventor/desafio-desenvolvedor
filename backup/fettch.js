 /*  === One file upload === * /

        const options = {
        method: 'POST',
        mode: 'no-cors',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Content-length': files[0].size,
        /*'Access-Control-Allow-Methods': 'POST, GET, OPTIONS',
        'Access-Control-Allow-Origin': domain,
        'Authorization': 'Bearer ' + localToken * /
        }, 
        body: files[0], /* GET/HEAD method cannot have body * /
        }; /** */

    /*  === Multiples files upload ===  * /

        let formData = new FormData();
        formData.append('name', 'form');
        for(let i = 0; i < fileCount; i++ )
        {
            formData.append('file-' + i, files[i], files[i].name);
        }

        const options = {
        method: 'POST',
        mode: 'no-cors',
        body: formData, /* GET/HEAD method cannot have body * /
        };

        let request = new Request(apiUrl, options);

        fetch(request).then(data => {
        if (!data.ok) {
        throw Error(data.status);
        }
        let fileContent = (data != '' && typeof data != 'undefined') ? data : [{"type":"jpg","name":"no-name","size":2121278}];
        console.log('fileContent:: ' + JSON.stringify(fileContent[0], null, 1));
        }).catch(console.warn); /** */