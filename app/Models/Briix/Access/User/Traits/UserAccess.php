<?php

namespace App\Models\Briix\Access\User\Traits;


use App\Models\Briix\Access\Contract\Contract;
use App\Models\Briix\Access\Packet\Packet;

use  App\Models\Cmovil\Access\User\User as CMUser;

/**
 * Class UserAccess
 * @package App\Models\Briix\Access\User\Traits
 */
trait UserAccess
{
    /**
     * Checks if the user has a Role by its name or id.
     *
     * @param  string $nameOrId Role name or id.
     * @return bool
     */
    public function hasRole($nameOrId)
    {
        foreach ($this->roles as $role) {
            //See if role has all permissions
            if ($role->all) {
                return true;
            }

            //First check to see if it's an ID
            if (is_numeric($nameOrId)) {
                if ($role->id == $nameOrId) {
                    return true;
                }
            }

            //Otherwise check by name
            if ($role->name == $nameOrId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if the user has a Packet by its name or id.
     *
     * @param  string $nameOrId Packet name or id.
     * @return bool
     */
    public function hasPacket($nameOrId)
    {
        foreach ($this->packets as $packet) {
            //See if role has all permissions
            if ($packet->all) {
                return true;
            }

            //First check to see if it's an ID
            if (is_numeric($nameOrId)) {
                if ($packet->id == $nameOrId) {
                    return true;
                }
            }

            //Otherwise check by name
            if ($packet->name == $nameOrId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks to see if user has array of roles
     *
     * All must return true
     * @param  $roles
     * @param  $needsAll
     * @return bool
     */
    public function hasRoles($roles, $needsAll)
    {
        //User has to possess all of the roles specified
        if ($needsAll) {
            $hasRoles = 0;
            $numRoles = count($roles);

            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    $hasRoles++;
                }
            }

            return $numRoles == $hasRoles;
        }

        //User has to possess one of the roles specified
        $hasRoles = 0;
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                $hasRoles++;
            }

        }

        return $hasRoles > 0;
    }

    /**
     * Checks to see if user has array of Packets
     *
     * All must return true
     * @param  $packets
     * @param  $needsAll
     * @return bool
     */
    public function hasPackets($packets, $needsAll)
    {
        //User has to possess all of the Packets specified
        if ($needsAll) {
            $hasPackets = 0;
            $numPackets = count($packets);

            foreach ($packets as $packet) {
                if ($this->hasPacket($packet)) {
                    $hasPackets++;
                }
            }

            return $numPackets == $hasPackets;
        }

        //User has to possess one of the Packets specified
        $hasPackets = 0;
        foreach ($packets as $packet) {
            if ($this->hasPacket($packet)) {
                $hasPackets++;
            }

        }

        return $hasPackets > 0;
    }
     

    /**
     * Check if user has a permission by its name or id.
     *
     * @param  string $nameOrId Permission name or id.
     * @return bool
     */
    public function allow($nameOrId)
    {
        foreach ($this->roles as $role) {
            //See if role has all permissions
            if ($role->all) {
                return true;
            }

            // Validate against the Permission table
            foreach ($role->permissions as $perm) {

                //First check to see if it's an ID
                if (is_numeric($nameOrId)) {
                    if ($perm->id == $nameOrId) {
                        return true;
                    }
                }

                //Otherwise check by name
                if ($perm->name == $nameOrId) {
                    return true;
                }
            }
        }

        return false;
    }
    public function allowproductpermission($nameOrId)
    { 
        $enterprise=$this->enterprise;
        $contracts= $enterprise->contracts;
        $contracts[0]->database;
        


        $user=CMUser::where('email', $this->email)->First();
       // dd($user->roles);
       
        foreach ( $user->roles as $role) {
            //See if role has all permissions
            if ($role->all) {
                return true;
            }

            // Validate against the Permission table
            foreach ($role->permissions as $perm) {

                //First check to see if it's an ID
                if (is_numeric($nameOrId)) {
                    if ($perm->id == $nameOrId) {
                        return true;
                    }
                }

                //Otherwise check by name
                if ($perm->name == $nameOrId) {
                    return true;
                }
            }
        }

        return false;
    }

    public function allowcmpermission($nameOrId)
    { 
        $enterprise=$this->enterprise;
        $contracts= $enterprise->contracts;
        $contracts[0]->database;
        


        $user=CMUser::where('email', $this->email)->First();
       // dd($user->roles);
       
        foreach ( $user->roles as $role) {
            //See if role has all permissions
            if ($role->all) {
                return true;
            }

            // Validate against the Permission table
            foreach ($role->permissions as $perm) {

                //First check to see if it's an ID
                if (is_numeric($nameOrId)) {
                    if ($perm->id == $nameOrId) {
                        return true;
                    }
                }

                //Otherwise check by name
                if ($perm->name == $nameOrId) {
                    return true;
                }
            }
        }

        return false;
    }
    /**
     * Check if user has a permissionsefvices by its name or id.
     *
     * @param  string $nameOrId Permissionproduct name or id.
     * @return bool
     */
    public function allowproduct($nameOrId)
    {
       // dd($nameOrId);
        $enterprise=$this->enterprise;
        $contracts= $enterprise->contracts;
        //$contracts= $contracts->toArray());
       // $contracts=Contract::where('enterprise_id', $enterprise->id);
      // dd($contracts[0]->packets);
        $packets;
       // dd($packets);
        //dd($contracts->toArray());
    if($contracts->toArray()!=null)
    {
        foreach ($contracts as $contract){
            $packets=$contract->packets;
          
        } 
        //dd($packets);
        foreach ($packets as $packet) {
            //See if Packet has all permissions
            if ($packet->all) {
                return true;
            }
            //dd($packet->products);

            // Validate against the Permissionproduct table
            foreach ($packet->products as $perm) {

                //First check to see if it's an ID
                if (is_numeric($nameOrId)) {
                    if ($perm->id == $nameOrId) {
                        return true;
                    }
                }

                //Otherwise check by name
                if ($perm->name == $nameOrId) {
                    return true;
                }
            }
        }
    }

        return false;
    }
     public function allowservice($nameOrId)
    {
        foreach ($this->packets as $plan) {
            //See if plan has all permissions
            if ($plan->all) {
                return true;
            }
            // Validate against the Permissionservice table
            foreach ($plan->products as $perm) {
                //First check to see if it's an ID
                if (is_numeric($nameOrId)) {
                    if ($perm->id == $nameOrId) {
                        return true;
                    }
                }
                //Otherwise check by name
                if ($perm->name == $nameOrId) {
                    return true;
                }
            }
        }
        return false;
    }
     
    /**
     * Check an array of permissions and whether or not all are required to continue
     *
     * @param  $permissions
     * @param  $needsAll
     * @return bool
     */
    public function allowMultiple($permissions, $needsAll = false)
    {
        //User has to possess all of the permissions specified
        if ($needsAll) {
            $hasPermissions = 0;
            $numPermissions = count($permissions);

            foreach ($permissions as $perm) {
                if ($this->allow($perm)) {
                    $hasPermissions++;
                }
            }

            return $numPermissions == $hasPermissions;
        }

        //User has to possess one of the permissions specified
        $hasPermissions = 0;
        foreach ($permissions as $perm) {
            if ($this->allow($perm)) {
                $hasPermissions++;
            }
        }

        return $hasPermissions > 0;
    }

    /**
     * Check an array of permissions and whether or not all are required to continue
     *
     * @param  $permissions
     * @param  $needsAll
     * @return bool
     */
    public function allowMultipleproduct($products, $needsAll = false)
    {
        dd($products);
        //User has to possess all of the permissions specified
        if ($needsAll) {
            $hasProducts = 0;
            $numProducts = count($products);

            foreach ($products as $perm) {
                if ($this->allowproduct($perm)) {
                    $hasProducts++;
                }
            }

            return $numProducts == $hasProducts;
        }

        //User has to possess one of the permissions specified
        $hasProducts = 0;
        foreach ($products as $perm) {
            if ($this->allowproduct($perm)) {
                $hasProducts++;
            }
        }

        return $hasProducts > 0;
    }


    /**
     * @param  $nameOrId
     * @return bool
     */
    public function hasPermission($nameOrId)
    {
        return $this->allow($nameOrId);
    }

    /**
     * @param  $nameOrId
     * @return bool
     */
    public function hasProduct($nameOrId)
    {
        return $this->allowproduct($nameOrId);
    }
    public function hasPermissionservice($nameOrId)
    {
        return $this->allowproduct($nameOrId);
    }


    /**
     * @param  $permissions
     * @param  bool           $needsAll
     * @return bool
     */
    public function hasPermissions($permissions, $needsAll = false)
    {
        return $this->allowMultiple($permissions, $needsAll);
    }

    /**
     * @param  $permissions
     * @param  bool           $needsAll
     * @return bool
     */
    public function hasProducts($products, $needsAll = false)
    {
        return $this->allowMultipleproducts($products, $needsAll);
    }

    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param  mixed  $role
     * @return void
     */
    public function attachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }

    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param  mixed  $Packet
     * @return void
     */
    public function attachPacket($packet)
    {
        if (is_object($packet)) {
            $packet = $packet->getKey();
        }

        if (is_array($packet)) {
            $packet = $packet['id'];
        }

        $this->packets()->attach($packet);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param  mixed  $role
     * @return void
     */
    public function detachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->detach($role);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param  mixed  $Packet
     * @return void
     */
    public function detachPacket($packet)
    {
        if (is_object($packet)) {
            $packet = $packet->getKey();
        }

        if (is_array($packet)) {
            $packet = $packet['id'];
        }

        $this->packets()->detach($packet);
    }
    
  
    /**
     * Attach multiple roles to a user
     *
     * @param  mixed  $roles
     * @return void
     */
    public function attachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    /**
     * Attach multiple Packets to a user
     *
     * @param  mixed  $Packets
     * @return void
     */
    public function attachPackets($packets)
    {
        foreach ($packets as $packet) {
            $this->attachPacket($packet);
        }
    }
    

    /**
     * Detach multiple roles from a user
     *
     * @param  mixed  $roles
     * @return void
     */
    public function detachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }

    /**
     * Detach multiple Packets from a user
     *
     * @param  mixed  $Packets
     * @return void
     */
    public function detachPackets($packets)
    {
        foreach ($packets as $packet) {
            $this->detachPacket($packet);
        }
    }
     
}
