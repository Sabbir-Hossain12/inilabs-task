@extends('layout.app')


@section('content')
    <section class="vh-100" style="background-color: #e2d5de;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">

                            <h6 class="mb-3">Sabbir's Todo List</h6>

                            <form class="d-flex justify-content-center align-items-center mb-4">
                                <div class="form-outline flex-fill">
                                    <input type="text" id="form3" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3">What do you need to do today?</label>
                                </div>
                                <button onclick="taskSubmit()"  type="submit" class="btn btn-primary btn-lg ms-2">Add</button>
                            </form>

                            <ul class="list-group mb-0" id="taskList">


                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <script>
        (async ()=>
        {
            await taskList()
        })();

async function taskList()
{
  try {
      let res=await axios.get('/tasks')
      $('#taskList').empty()
      res.data.forEach(function (item,i) {

          let foreach=`<li
                                    class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input me-2 task-checkbox" type="checkbox" value="" aria-label="..." ${item['is_complete'] ? 'checked' : ''}  />

                                    <span class="task-name ${item['is_complete'] ? 'completed' : ''}">${item['name']}</span>
                                    </div>
                                    <button data-id="${item['id']}" onclick="taskDelete(${item['id']})" class="btn deleteTask" data-mdb-toggle="tooltip" title="Remove item">
                                        <i class="fas fa-times text-primary"></i>
                                    </button>
                                </li>`
          $('#taskList').append(foreach)
      })

      // Add event listener to checkboxes
      $('.task-checkbox').change(function() {
          let taskId = $(this).closest('li').find('.deleteTask').data('id');
          let isComplete = $(this).prop('checked');
          taskUpdate(taskId, isComplete);
      });


  }
  catch (e) {
      console.log(e.message)
  }
}

     async function taskSubmit()
     {
       let name=  $('#form3').val()

         if(name.length===0)
         {
             errorToast('please enter task name')

         }
         else
         {
             let res=await axios.post('/tasks',{name:name})

             if(res.data==='successful')
             {
                successToast('Task Added')
                 await taskList();
             }
             else
             {
                 errorToast('error')
             }
         }


     }

async function taskDelete(id)
{
try {


    let res = await axios.delete('/tasks/' + id)
    if (res.status === 204) {
        await taskList();
       successToast('Task Deleted')
    } else {
        errorToast('Error')
    }
}
catch (e) {
    console.log(e.message)
}
}

        async function taskUpdate(id, isComplete) {
            try {
                let res = await axios.put('/tasks/' + id, {is_complete: isComplete});
                if (res.status === 200) {
                    await taskList();
                    successToast('Task Updated')
                } else {
                   errorToast('Error')
                }
            } catch (e) {
                console.log(e.message);
            }
        }
    </script>
@endsection
