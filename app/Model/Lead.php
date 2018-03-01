<?php

namespace App\Model;

use App\Common\Common;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lead extends Model
{
    //
    protected $table = 'leads';
    protected $fillable = [
        'email',
        'fullname',
        'gender',
        'birthday',
        'address',
        'phone',
        'notes',
        'product_id',
        'status',
        'region_id',
        'tipster_id'
    ];

    public function region(){
        return $this->belongsTo('App\Region');
    }
    public function tipster(){
        return $this->belongsTo('App\User');
    }

    public static function getAllLead(){
        $leads = DB::table('leads')
            ->join('products', 'products.id', 'leads.product_id')
            ->join('users', 'users.id', 'leads.tipster_id')
            ->join('regions', 'regions.id', 'leads.region_id')
            ->select('leads.*', 'products.name as product', 'users.fullname as tipster', 'regions.name as region')
            ->orderBy('created_at', 'desc')
            ->get();
        return $leads;
    }
    public static function getAllLeadNotYetAssign(){
        $leads = DB::table('leads')->select('*')
            ->whereNOTIn('id', function ($query){
                $query->select('lead_id')->from('assignments');
            })->get();
        return $leads;
    }

    public static function getLeadByID($id){
        $lead = Lead::where('leads.id', $id)
            ->join('products', 'products.id', 'leads.product_id')
            ->join('users', 'users.id', 'leads.tipster_id')
            ->join('regions', 'regions.id', 'leads.region_id')
            ->select('leads.*', 'products.name as product', 'users.fullname as tipster', 'regions.name as region')
            ->orderBy('created_at', 'desc')
            ->first();

        return $lead;
    }

    public static function showNameStatus($statusID){
        $name = '';
        switch ($statusID){
            case 0:
                $name = 'New';
                break;
            case 1:
                $name = 'Call';
                break;
            case 2:
                $name = 'Quote';
                break;
            case 3:
                $name = 'Win';
                break;
            case 4:
                $name = 'Lost';
                break;
        }
        return $name;
    }
    public static function showColorStatus($statusID){
        $name = '';
        switch ($statusID){
            case 0:
                $name = 'label-new';
                break;
            case 1:
                $name = 'label-quote';
                break;
            case 2:
                $name = 'label-call';
                break;
            case 3:
                $name = 'label-win';
                break;
            case 4:
                $name = 'label-lost';
                break;
        }
        return $name;
    }
    public static function showGender($gender){
        $name = '';
        switch ($gender){
            case 0:
                $name = 'Male';
                break;
            case 1:
                $name = 'Female';
                break;
        }
        return $name;
    }

    public static function getRecentLeads($num = 5){
        $leads = DB::table('leads')->orderBy('created_at', 'desc')->limit($num)->get();
        return $leads;
    }

    public static function getAmountByStatus($status){
        $amount = count(Lead::where('status', $status)->get());
        return $amount;
    }

    public static function getTipsterHeighestLead($num = 5){
        $sql = "select users.id,users.username,users.fullname,users.avatar, tableTips.status, tableTips.countStatus, users.point
                from users 
                    inner join (
                            select leads.tipster_id,leads.status, count(leads.status) as countStatus
                            from leads
                                        inner join (
                                            select tipster_id , count(tipster_id) as countTipster 
                                            from leads 
                                            group by tipster_id 
                                            order by countTipster desc 
                                            limit ".$num."
                                     ) tableTips
                                     ON (tableTips.tipster_id = leads.tipster_id)
                             group by leads.tipster_id,leads.status     
                        ) tableTips
                    on ( tableTips.tipster_id = users.id )
                    ";
        $tipsters = DB::select($sql);
        $result = array();
        if(isset($tipsters)){
            $tipsterIdOld = "";
            $tipsterCurrent = null;
            foreach($tipsters as $tipster){
                if($tipsterIdOld != $tipster->id){
                    array_push ($result, $tipster);
                    $tipsterCurrent = $tipster;
                    $strStatusLead = Lead::showNameStatus($tipster->status).":".$tipster->countStatus;
                    $tipsterCurrent->strStatusLead = '<span style="color:'.Common::colorStatus($tipster->status).'">'.$strStatusLead.'</span>';
                }else{
                    $strStatusLead = Lead::showNameStatus($tipster->status).":".$tipster->countStatus;
                    $tipsterCurrent->strStatusLead.= ' - <span style="color:'.Common::colorStatus($tipster->status).'">'.$strStatusLead.'</span>';

                    $tipsterCurrent->countStatus+=$tipster->countStatus;
                }
                $tipsterIdOld = $tipster->id;
            }
        }
        $resultsort = collect($result)->sortBy('countStatus')->reverse()->toArray();
        return $resultsort;
    }

    public static function sumStatusByRecentLead($num = 5){
        $recents = DB::table('leads')
            ->select('*')
            ->orderBy('created_at', 'desc')
            ->limit($num);
        $tipsters = DB::table(DB::raw("({$recents->toSql()}) as recents"))
            ->join('leads', 'recents.id', '=', 'leads.id')
            ->groupBy('leads.status')
            ->select(DB::raw("leads.status, count(leads.status) as countStatus"))->get();
//        dd($tipsters);
        return $tipsters;
    }

    public static function getAllLeadBelongTipster($tipster_id){
        $leads = Lead::where('tipster_id', $tipster_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return $leads;
    }
}
