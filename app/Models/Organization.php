<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'created_by',
        'org_type_id',
        'name',
        'contact_name',
        'gstin',
        'contact_email',
        'contact_number',
        'pan_number',
        'address',
        'landmark',
        'pincode',
        'city',
        'state',
        'website',
        'logo',
        'signature_img',
        'enable_signature',
        'invoice_background_img',
        'invoice_footer_img',
        'enable_rounding',
        'allow_oversell',
        'is_primary',
        'is_gst',
        'gst_percent',
        'gst_slab'
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function OrganizationType()
    {
        return $this->belongsTo(OrganizationType::class);
    }
    public static function defaultOrganization($user_id){
            $organizations=OrganizationUserMap::with('organization')->where("user_id",$user_id)->get();
            $orginfo=[];
            foreach($organizations as $org){
                    if($org->is_primary){
                        $orginfo=$org->organization;
                    }
            }
            if(empty($org))
            {
                $user=User::find($user_id);
                $orgdata=[
                    'created_by'=>$user->id,
                    'name' => $user->mobile_number
                ];
                $org=Organization::create($orgdata);
                $user->org_id=$org->id;
                $user->save();

                $orgmap=[
                    'org_id'=>$org->id,
                    'created_by'=>$user->id,
                    'is_admin'=> true,
                    'user_id'=>$user->id,
                    'is_active' => true,
                    'is_primary' => true,
                ];

                OrganizationUserMap::create($orgmap);
                $organizations=OrganizationUserMap::with('organization')->where("user_id",$user_id)->get();
                foreach($organizations as $org){
                        if($org->is_primary){
                            $orginfo=$org->organization;
                        }
                }

                return $orginfo;


            }else{
                return $orginfo;
            }
    }
    public function getLogoAttribute($value)
    {
        return url("avatar/".$value) ;
    }

    
}
