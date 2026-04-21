<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $fillable = [
        'uuid',
        'protocol_number',
        'name',
        'city',
        'state',
        'region_district',
        'electoral_zone_reference',
        'founding_date',
        'operational_status',
        'legal_status',
        'affiliation_status',
        'cnpj',
        'cnpj_registration_date',
        'registry_number',
        'social_name',
        'legal_nature',
        'statute_number',
        'statute_approval_date',
        'minutes_number',
        'registry_office',
        'book_number',
        'sheet_number',
        'address_base',
        'address_number',
        'address_complement',
        'neighborhood',
        'zip_code',
        'reference_point',
        'headquarters_type',
        'phone_contact',
        'whatsapp_contact',
        'email_official',
        'instagram',
        'facebook',
        'website_url',
        'responsible_user_id',
        'president_id',
        'vice_president_id',
        'secretary_id',
        'treasurer_id',
        'communication_director_id',
        'members_count',
        'municipalities_served_count',
        'local_nuclei_count',
        'coverage_notes',
        'submitted_at',
        'approved_at',
        'activated_at',
        'blocked_at',
        'rejected_at',
        'created_by',
        'updated_by',
        'directory_type',
        'slug',
        'subdomain',
    ];

    protected $casts = [
        'founding_date' => 'date',
        'cnpj_registration_date' => 'date',
        'statute_approval_date' => 'date',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'activated_at' => 'datetime',
        'blocked_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function directoryMembers()
    {
        return $this->hasMany(DirectoryMember::class);
    }

    public function president()
    {
        return $this->belongsTo(User::class, 'president_id');
    }

    public function vicePresident()
    {
        return $this->belongsTo(User::class, 'vice_president_id');
    }

    public function secretary()
    {
        return $this->belongsTo(User::class, 'secretary_id');
    }

    public function treasurer()
    {
        return $this->belongsTo(User::class, 'treasurer_id');
    }

    public function communicationDirector()
    {
        return $this->belongsTo(User::class, 'communication_director_id');
    }

    public function actions()
    {
        return $this->hasMany(DirectoryAction::class);
    }

    public function members()
    {
        return $this->hasMany(DirectoryMember::class);
    }

    public function documents()
    {
        return $this->hasMany(DirectoryDocument::class);
    }

    public function checklistItems()
    {
        return $this->hasMany(DirectoryChecklistItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(DirectoryReview::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->protocol_number)) {
                $model->protocol_number = 'PRT-DIR-' . date('Y') . '-' . strtoupper(bin2hex(random_bytes(2)));
            }
            if (empty($model->uuid)) {
                $model->uuid = (string) \Illuminate\Support\Str::uuid();
            }
            if (empty($model->operational_status)) $model->operational_status = 'draft';
            if (empty($model->legal_status)) $model->legal_status = 'not_formalized';
            if (empty($model->affiliation_status)) $model->affiliation_status = 'applicant';

            if (empty($model->slug) && !empty($model->city)) {
                $baseSlug = \Illuminate\Support\Str::slug($model->city);
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }
                $model->slug = $slug;
            }

            if (empty($model->subdomain) && !empty($model->slug)) {
                $model->subdomain = $model->slug;
            }
        });
    }

    public function seedChecklist()
    {
        $items = [
            ['RG_CPF', 'RG e CPF dos Fundadores'],
            ['TITULO', 'Título de Eleitor'],
            ['RESIDENCIA', 'Comprovante de Residência'],
            ['ATA', 'Ata Assinada'],
            ['PRESENCA', 'Lista de Presença'],
            ['ESTATUTO', 'Estatuto Assinado'],
            ['FOTOS', 'Fotos 3x4 Diretoria'],
            ['CNPJ', 'CNPJ ou Protocolo'],
            ['CARTORIO', 'Registro em Cartório'],
            ['ENDERECO_SEDE', 'Declaração de Endereço da Sede'],
            ['FORM_ASSINADO', 'Formulário Completo Assinado'],
            ['APROV_REGIONAL', 'Aprovação Regional/Estadual'],
        ];

        foreach ($items as $item) {
            $this->checklistItems()->create([
                'item_code' => $item[0],
                'item_name' => $item[1],
                'is_required' => true,
            ]);
        }
    }

    public function getValidationErrors()
    {
        $errors = [];
        if (!$this->president_id) $errors[] = "Presidente não definido.";
        if (!$this->secretary_id) $errors[] = "Secretário não definido.";
        if (!$this->treasurer_id) $errors[] = "Tesoureiro ou Diretor Financeiro não definido.";
        if (empty($this->address_base)) $errors[] = "Endereço base não preenchido.";
        if (empty($this->email_official)) $errors[] = "E-mail oficial não preenchido.";
        
        $mandatoryDocs = ['statute_signed', 'foundation_minutes', 'attendance_list', 'full_form_signed'];
        $presentDocs = $this->documents()->whereIn('category', $mandatoryDocs)->where('status', 'approved')->pluck('category')->toArray();
        $missingDocs = array_diff($mandatoryDocs, $presentDocs);
        
        foreach ($missingDocs as $doc) {
            $errors[] = "Documento obrigatório faltando ou não aprovado: " . str_replace('_', ' ', ucfirst($doc));
        }

        $pendingChecklist = $this->checklistItems()->where('is_required', true)->where('status', '!=', 'approved')->count();
        if ($pendingChecklist > 0) {
            $errors[] = "Existem $pendingChecklist itens obrigatórios no checklist não verificados.";
        }
        
        return $errors;
    }
}
