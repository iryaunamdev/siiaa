<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Usernotnull\Toast\Concerns\WireToast;

class CRUD extends Component
{
    use WireToast;

    public $name, $email, $password, $photo, $user_id;
    public $user, $usuarios, $roles, $selectedRoles=[];

    public $editMode = false;


    public function render()
    {
        $this->usuarios = User::all()->sortBy('name');
        $this->roles = Role::all();

        return view('livewire.usuarios.c-r-u-d');
    }

    public function editarUsuario(User $user)
    {
        $this->user = $user;
        $this->editMode = true;

        if($this->user)
        {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->user_id = $user->id;
            $this->password = $user->password;

            $user_roles = $user->getRoleNames();
            foreach($this->roles as $role)
            {
                if($user_roles->contains($role->name))
                {
                    $this->selectedRoles[$role->id] = true;
                }else{
                    $this->selectedRoles[$role->id] = false;
                }
            }
        }
    }

    public function storeUser()
    {
        if($this->user_id){
            $this->validate([
                'name'=>'required',
                'email'=>'required|email',
            ]);

            $user = User::findOrfail($this->user_id);
            $user->name = $this->name;
            $user->email= $this->email;
            $user->save();

            toast()->info('Datos de usuario actualizados')->push();

        }else{
            $this->validate([
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required',
            ]);

            $user = User::create([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>bcrypt($this->password),
            ]);
            toast()->success('Usuario creado.')->push();
        }

        //Asignar Roles
        $roles = [];
        foreach($this->selectedRoles as $index => $selectedRole)
        {
            if($selectedRole)
            {
                array_push($roles, Role::findOrFail($index)->name);
            }
        }

        $user->syncRoles($roles);
        $this->editMode = false;

    }

    public function updatePassword()
    {

    }
}
