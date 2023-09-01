<div class="form">
   
    @csrf
    @if(!empty($successMessage))
    <div class="alert alert-success">
       {{ $successMessage }}
    </div>
    @endif
    
   
    
        <!-- progressbar -->
        <ul class="progressbar">
            <li class="{{ $currentStep != 1 ? '' : 'active' }}"></li>
            <li class="{{ $currentStep != 2 ? '' : 'active' }}"></li>
            <li class="{{ $currentStep != 3 ? '' : 'active' }}"></li>
        </ul>
        
    

    @if(!empty($errorMessage))
    <div class="alert alert-warning" role="alert">
        {{$errorMessage}}
    </div>
    @endif
    @include('livewire.registroJCST.step1')
    
    @include('livewire.registroJCST.step2')
      
    @include('livewire.registroJCST.step3')
    

    
       
</div>


