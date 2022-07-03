<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Reviewer System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body style="height: 100vh; overflow: auto; background-color: rgb(0, 200, 255);">
<!-- blue orange green -->
    <div style="height: 20%;">
    </div>
    <div style="background-color: orange; margin: auto; height: 60%; width: 60%; text-align: center; border-radius: 20px; font-size: 25px;">
        <div style="height: 10%"></div>
        <div id="sample_question_display" style="color: black;">
        Sample Question here?
        </div>
        <div style="height: 15%"></div>
        <div id="sample_answer_display" style="color: white; font-size: 30px;">
        Sample Answer here!
        </div>
        <div style="height: 20%"></div>
        <input type="button" value="Click Me!" style = "border-radius: 20px; background-color: lime; border: none; padding: 10px;" onclick = "fetch_function_question_and_answer()">
    </div>
    </div>
</body>
<script>
    function fetch_function_question_and_answer(){
        y = 1;
        document.getElementById("sample_question_display").innerHTML = "";
        document.getElementById("sample_answer_display").innerHTML = "";
        if(document.getElementById("sample_answer_display").style.visibility == "visible"){
            x = Math.floor(Math.random() * 34);
            if(y == 0){ // MODULE 1
                if(x == 0){
                    document.getElementById("sample_question_display").innerHTML = " is a sequence of steps that take inputs from the user and after some computation, produces an output.";
                    document.getElementById("sample_answer_display").innerHTML = "Algorithm";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 1){
                    document.getElementById("sample_question_display").innerHTML = " is an algorithm that can execute several instructions simultaneously on different processing devices and then combine all the individual outputs to produce the final result.";
                    document.getElementById("sample_answer_display").innerHTML = "Parallel Algorithm ";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 2){
                    document.getElementById("sample_question_display").innerHTML = "The easy availability of computers along with the growth of Internet has changed the way we store and process data. We are living in a day and age where data is available in abundance. Every day we deal with huge volumes of data that require complex computing and that too, in quick time.";
                    document.getElementById("sample_answer_display").innerHTML = "Concurrent Processing";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 3){
                    document.getElementById("sample_question_display").innerHTML = "can divide a complex task and process it multiple systems to produce the output in quick time.";
                    document.getElementById("sample_answer_display").innerHTML = "concurrent processing";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 4){
                    document.getElementById("sample_question_display").innerHTML = " is essential where the task involves processing a huge bulk of complex data.";
                    document.getElementById("sample_answer_display").innerHTML = "Concurrent processing";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 5){
                    document.getElementById("sample_question_display").innerHTML = " is the process of processing several set of instructions simultaneously. It reduces the total computational time. can be implemented by using parallel computers, i.e. a computer with many processors.";
                    document.getElementById("sample_answer_display").innerHTML = "Parallelism";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 6){
                    document.getElementById("sample_question_display").innerHTML = " require parallel algorithm, programming languages, compilers and operating system that support multitasking.";
                    document.getElementById("sample_answer_display").innerHTML = " Parallel computers";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 7){
                    document.getElementById("sample_question_display").innerHTML = "is a sequence of instructions followed to solve a problem. While designing an algorithm, we should consider the architecture of computer on which the algorithm will be executed.";
                    document.getElementById("sample_answer_display").innerHTML = "algorithm";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 8){
                    document.getElementById("sample_question_display").innerHTML = "As per the architecture, there are two types of computers −";
                    document.getElementById("sample_answer_display").innerHTML = "Sequential Computer & Parallel Computer";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 9){
                    document.getElementById("sample_question_display").innerHTML = " An algorithm in which some consecutive steps of instructions are executed in a chronological order to solve a problem.";
                    document.getElementById("sample_answer_display").innerHTML = "Sequential Algorithm";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 10){
                    document.getElementById("sample_question_display").innerHTML = "The problem is divided into sub-problems and are executed in parallel to get individual outputs. Later on, these individual outputs are combined together to get the final desired output.";
                    document.getElementById("sample_answer_display").innerHTML = "Parallel Algorithm";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 11){
                    document.getElementById("sample_question_display").innerHTML = "To design an algorithm properly, we must have a clear idea of the basic ____________ in a parallel computer";
                    document.getElementById("sample_answer_display").innerHTML = "model of computation";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 12){
                    document.getElementById("sample_question_display").innerHTML = "Depending on the instruction stream and data stream, computers can be classified into four categories −";
                    document.getElementById("sample_answer_display").innerHTML = "(SISD), (SIMD), (MISD), and (MIMD)";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 13){
                    document.getElementById("sample_question_display").innerHTML = "Analysis of an algorithm helps us determine whether the algorithm is useful or not. Generally, an algorithm is analyzed based on its execution time (_____________) and the amount of space (______________) it requires.";
                    document.getElementById("sample_answer_display").innerHTML = "Time Complexity & Space Complexity";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 14){
                    document.getElementById("sample_question_display").innerHTML = "The main reason behind developing parallel algorithms was to reduce the computation time of an algorithm. Thus, evaluating the execution time of an algorithm is extremely important in analyzing its efficiency.";
                    document.getElementById("sample_answer_display").innerHTML = "Time Complexity";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 15){
                    document.getElementById("sample_question_display").innerHTML = "When the amount of time required by an algorithm for a given input is maximum";
                    document.getElementById("sample_answer_display").innerHTML = "Worst-case complexity";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                } 
                else if (x == 16){
                    document.getElementById("sample_question_display").innerHTML = '<img src="z_images/mimd_computers.jpg" alt="" style="width:50%;"/>';
                    document.getElementById("sample_answer_display").innerHTML = "MIMD";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 17){
                    document.getElementById("sample_question_display").innerHTML = '<img src="z_images/misd_computers.jpg" alt="" style="width:50%;"/>';
                    document.getElementById("sample_answer_display").innerHTML = "MISD";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 18){
                    document.getElementById("sample_question_display").innerHTML = '<img src="z_images/simd_computers.jpg" alt="" style="width:50%;"/>';
                    document.getElementById("sample_answer_display").innerHTML = "SIMD";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 19){
                    document.getElementById("sample_question_display").innerHTML = '<img src="z_images/sisd_computers.jpg" alt="" style="width:50%;"/>';
                    document.getElementById("sample_answer_display").innerHTML = "SISD";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 20){
                    document.getElementById("sample_question_display").innerHTML = "When the amount of time required by an algorithm for a given input is average.";
                    document.getElementById("sample_answer_display").innerHTML = "Average-case complexity";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 21){
                    document.getElementById("sample_question_display").innerHTML = "When the amount of time required by an algorithm for a given input is minimum.";
                    document.getElementById("sample_answer_display").innerHTML = "Best-case complexity";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 22){
                    document.getElementById("sample_question_display").innerHTML = "The complexity or efficiency of an algorithm is the number of steps executed by the algorithm to get the desired output. ______________ is done to calculate the complexity of an algorithm in its theoretical analysis. In ______________, a large length of input is used to calculate the complexity function of the algorithm.";
                    document.getElementById("sample_answer_display").innerHTML = "Asymptotic Analysis";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 23){
                    document.getElementById("sample_question_display").innerHTML = "is a condition where a line tends to meet a curve, but they do not intersect. Here the line and the curve is ___________ to each other.";
                    document.getElementById("sample_answer_display").innerHTML = "Asymptotic";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 24){
                    document.getElementById("sample_question_display").innerHTML = "In data parallel model, tasks are assigned to processes and each task performs similar types of operations on different data.";
                    document.getElementById("sample_answer_display").innerHTML = "Data Parallel";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 25){
                    document.getElementById("sample_question_display").innerHTML = "is a consequence of single operations that is being applied on multiple data items.";
                    document.getElementById("sample_answer_display").innerHTML = "Data parallelism";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 26){
                    document.getElementById("sample_question_display").innerHTML = " parallelism is expressed by a task graph. A task graph can be either trivial or nontrivial. In this model, the correlation among the tasks are utilized to promote locality or to minimize interaction costs.";
                    document.getElementById("sample_answer_display").innerHTML = "Task Graph Model";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 27){
                    document.getElementById("sample_question_display").innerHTML = "tasks are dynamically assigned to the processes for balancing the load. Therefore, any process may potentially execute any task. This model is used when the quantity of data associated with tasks is comparatively smaller than the computation associated with the tasks.";
                    document.getElementById("sample_answer_display").innerHTML = "Work Pool Model";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 28){
                    document.getElementById("sample_question_display").innerHTML = " one or more master processes generate task and allocate it to slave processes. The tasks may be allocated beforehand if −\n• the master can estimate the volume of the tasks, or\n• a random assigning can do a satisfactory job of balancing load, or\n• slaves are assigned smaller pieces of task at different times.";
                    document.getElementById("sample_answer_display").innerHTML = "Master-Slave Model";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 29){
                    document.getElementById("sample_question_display").innerHTML = "It is also known as the producer-consumer model. Here a set of data is passed on through a series of processes, each of which performs some task on it. Here, the arrival of new data generates the execution of a new task by a process in the queue.";
                    document.getElementById("sample_answer_display").innerHTML = "Pipeline Model";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 30){
                    document.getElementById("sample_question_display").innerHTML = "This model is a chain of producers and consumers. ";
                    document.getElementById("sample_answer_display").innerHTML = "Pipeline Model";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 31){
                    document.getElementById("sample_question_display").innerHTML = "may be composed of either multiple models applied hierarchically or multiple models applied sequentially to different phases of a parallel algorithm.";
                    document.getElementById("sample_answer_display").innerHTML = "Hybrid Models";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 32){
                    document.getElementById("sample_question_display").innerHTML = "A ______________ is required when more than one model may be needed to solve a problem.";
                    document.getElementById("sample_answer_display").innerHTML = "hybrid algorithm model";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 33){
                    document.getElementById("sample_question_display").innerHTML = "is a model, which is considered for most of the parallel algorithms. Here, multiple processors are attached to a single block of memory.";
                    document.getElementById("sample_answer_display").innerHTML = "Parallel Random Access Machines";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 34){
                    document.getElementById("sample_question_display").innerHTML = "What is PRAM";
                    document.getElementById("sample_answer_display").innerHTML = "Parallel Random Access Machines";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 35){
                    document.getElementById("sample_question_display").innerHTML = " Here no two processors are allowed to read from or write to the same memory location at the same time.";
                    document.getElementById("sample_answer_display").innerHTML = "Exclusive Read Exclusive Write (EREW)";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 36){
                    document.getElementById("sample_question_display").innerHTML = "Here no two processors are allowed to read from the same memory location at the same time, but are allowed to write to the same memory location at the same time.";
                    document.getElementById("sample_answer_display").innerHTML = "Exclusive Read Concurrent Write (ERCW)";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 37){
                    document.getElementById("sample_question_display").innerHTML = " Here all the processors are allowed to read from the same memory location at the same time, but are not allowed to write to the same memory location at the same time.";
                    document.getElementById("sample_answer_display").innerHTML = "Concurrent Read Exclusive Write (CREW)";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }else if (x == 38){
                    document.getElementById("sample_question_display").innerHTML = "All the processors are allowed to read from or write to the same memory location at the same time.";
                    document.getElementById("sample_answer_display").innerHTML = "Concurrent Read Concurrent Write (CRCW)";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
            }
            if(y == 1){ // MODULE 2 APPLIED PLOTTING
                if(x == 0){
                    document.getElementById("sample_question_display").innerHTML = "In his book, the Functional Art, _____________ provides a tool for thinking about design trade-offs when building information graphics, and he calls this tool the Visualization Wheel.";
                    document.getElementById("sample_answer_display").innerHTML = "Alberto Cairo";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 1){
                    document.getElementById("sample_question_display").innerHTML = "In this conceptualization there are two poles of a circle. The top one represents highly complex data which informs at a deep level. While the bottom provides easier access to data but only informs in a shallow manner. Inside the circle are dimensions which describe tradeoffs between two approaches.";
                    document.getElementById("sample_answer_display").innerHTML = "TRUE";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 2){
                    document.getElementById("sample_question_display").innerHTML = "A highly figurative visual describes the phenomenon using physical representations of the phenomena, such as photographs or drawings. As the representations become less real and more conceptual, the emphasis shifts from figuration to abstraction.";
                    document.getElementById("sample_answer_display").innerHTML = "Abstraction - Figuration";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 3){
                    document.getElementById("sample_question_display").innerHTML = "A completely functional graphic has no embellishments and is closer to a direct representation of the data. While a heavily decorated graphic has more artistic embellishments.";
                    document.getElementById("sample_answer_display").innerHTML = "Functionality - Decoration";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 4){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 5){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 6){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 7){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 8){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 9){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 10){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 11){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 12){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 13){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 14){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 15){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                } 
                else if (x == 16){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 17){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 18){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 19){
                    document.getElementById("sample_question_display").innerHTML = '<img src="z_images/sisd_computers.jpg" alt="" style="width:50%;"/>';
                    document.getElementById("sample_answer_display").innerHTML = "SISD";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 20){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 21){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 22){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 23){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 24){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 25){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 26){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 27){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 28){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 29){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 30){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 31){
                    document.getElementById("sample_question_display").innerHTML = "may be composed of either multiple models applied hierarchically or multiple models applied sequentially to different phases of a parallel algorithm.";
                    document.getElementById("sample_answer_display").innerHTML = "Hybrid Models";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 32){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                else if (x == 33){
                    document.getElementById("sample_question_display").innerHTML = "";
                    document.getElementById("sample_answer_display").innerHTML = "";
                    document.getElementById("sample_answer_display").style.visibility = "collapse";
                }
                
            }
        }else{
            document.getElementById("sample_answer_display").style.visibility = "visible";
        }
        
        
        
        
        
    }
</script>
</html>