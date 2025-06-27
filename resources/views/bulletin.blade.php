<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bulletin Scolaire / Report Card - Les étoiles de l'avenir</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
    min-height: 100vh;
    padding: 10mm;
}

.selection-panel {
    max-width: 900px;
    margin: 0 auto 20px;
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.selection-panel label {
    font-weight: 600;
    color: #374151;
    margin-right: 10px;
}

.selection-panel select {
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #e2e8f0;
    font-size: 1em;
    min-width: 200px;
}

.bulletin-container {
    max-width: 190mm;
    margin: 0 auto;
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    font-size: 10pt;
    line-height: 1.4;
}

.header {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: white;
    padding: 15mm;
    text-align: center;
    position: relative;
}

.header h1 {
    font-size: 18pt;
    margin-bottom: 5mm;
}

.header p {
    font-size: 10pt;
    opacity: 0.9;
}

.student-photo {
    width: 30mm;
    height: 40mm;
    border-radius: 5px;
    border: 2px solid #2563eb;
    object-fit: cover;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20pt;
    color: #64748b;
}

.student-info {
    padding: 10mm;
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(45mm, 1fr));
    gap: 5mm;
}

.info-card {
    background: white;
    padding: 5mm;
    border-radius: 5px;
    border-left: 3px solid #2563eb;
}

.info-label {
    font-weight: 600;
    color: #374151;
    font-size: 8pt;
    text-transform: uppercase;
    margin-bottom: 2mm;
}

.info-value {
    font-size: 9pt;
    color: #1f2937;
    font-weight: 500;
}

.notes-section {
    padding: 10mm;
}

.section-title {
    font-size: 12pt;
    color: #1f2937;
    margin-bottom: 8mm;
    text-align: center;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -3mm;
    left: 50%;
    transform: translateX(-50%);
    width: 20mm;
    height: 2px;
    background: #2563eb;
}

.notes-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
}

.notes-table th {
    background: #374151;
    color: white;
    padding: 3mm 4mm;
    text-align: left;
    font-size: 8pt;
    font-weight: 600;
    text-transform: uppercase;
}

.notes-table td {
    padding: 3mm 4mm;
    border-bottom: 1px solid #e5e7eb;
    font-size: 8pt;
}

.notes-table tr:hover td {
    background-color: #f9fafb;
}

.matiere {
    font-weight: 600;
    color: #374151;
}

.note {
    font-weight: 700;
    font-size: 9pt;
    text-align: center;
    padding: 2mm 3mm;
    border-radius: 3px;
    color: white;
    min-width: 15mm;
    display: inline-block;
}

.note.excellent { background: #10b981; }
.note.bien { background: #3b82f6; }
.note.assez-bien { background: #f59e0b; }
.note.passable { background: #ef4444; }

.coefficient, .moyenne-classe {
    text-align: center;
    font-weight: 600;
    color: #6b7280;
}

.appreciation {
    font-style: italic;
    color: #6b7280;
    max-width: 50mm;
}

.summary {
    background: #f8fafc;
    padding: 10mm;
    margin-top: 8mm;
    border-radius: 5px;
    border: 1px solid #e2e8f0;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(40mm, 1fr));
    gap: 5mm;
}

.summary-card {
    background: white;
    padding: 5mm;
    border-radius: 5px;
    text-align: center;
    border-top: 2px solid #2563eb;
}

.summary-value {
    font-size: 12pt;
    font-weight: 700;
    color: #2563eb;
    margin-bottom: 2mm;
}

.summary-label {
    color: #6b7280;
    font-size: 8pt;
    text-transform: uppercase;
}

.general-appreciation {
    background: white;
    padding: 5mm;
    border-radius: 5px;
    border-left: 3px solid #10b981;
}

.general-appreciation h3 {
    color: #374151;
    font-size: 9pt;
    margin-bottom: 3mm;
}

.general-appreciation p {
    color: #6b7280;
    font-size: 8pt;
    line-height: 1.4;
}

.footer {
    background: #374151;
    color: white;
    padding: 8mm;
    text-align: center;
    font-size: 8pt;
}

.signatures {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(40mm, 1fr));
    gap: 5mm;
    margin-top: 5mm;
}

.signature-block h4 {
    margin-bottom: 10mm;
    font-size: 8pt;
    text-transform: uppercase;
}

.signature-line {
    border-bottom: 1px solid #6b7280;
    width: 30mm;
    margin: 0 auto;
}

.print-btn {
    position: fixed;
    bottom: 10mm;
    right: 10mm;
    background: #2563eb;
    color: white;
    border: none;
    padding: 3mm 6mm;
    border-radius: 50px;
    font-size: 9pt;
    cursor: pointer;
    box-shadow: 0 5px 10px rgba(37, 99, 235, 0.3);
}

.print-btn:hover {
    transform: translateY(-1mm);
}

@media print {
    body {
        background: white;
        padding: 0;
        margin: 0;
    }
    .selection-panel, .print-btn {
        display: none;
    }
    .bulletin-container {
        box-shadow: none;
        border-radius: 0;
        width: 210mm;
        min-height: 297mm;
        margin: 0;
    }
}

@media (max-width: 768px) {
    .bulletin-container {
        font-size: 9pt;
    }
    .info-grid, .summary-grid {
        grid-template-columns: 1fr;
    }
    .notes-table th, .notes-table td {
        padding: 2mm 3mm;
    }
    .header h1 {
        font-size: 14pt;
    }
}
</style>
</head>
<body>
<div class="selection-panel">
    <div>
        <label for="section-select">Section:</label>
        <select id="section-select" onchange="updateClasses()">
            <option value="">Sélectionner une section / Select a section</option>
            <option value="Francophone">Francophone</option>
            <option value="Anglophone">Anglophone</option>
        </select>
    </div>
    <div>
        <label for="class-select">Classe / Class:</label>
        <select id="class-select" onchange="updateStudents()" disabled>
            <option value="">Sélectionner une classe / Select a class</option>
        </select>
    </div>
    <div>
        <label for="student-select">Élève / Student:</label>
        <select id="student-select" onchange="updateBulletin()" disabled>
            <option value="">Sélectionner un élève / Select a student</option>
        </select>
    </div>
</div>

<div class="bulletin-container">
    <div class="header">
        <h1>🌟 Les étoiles de l'avenir / Stars of the Future</h1>
        <p>Bulletin Scolaire / Report Card - 1er Trimestre / 1st Term 2024-2025</p>
    </div>

    <div class="student-info">
        <div class="info-grid">
            <div class="info-card">
                <div class="info-label">Photo de l'élève / Student Photo</div>
                <div class="student-photo" id="student-photo">📸</div>
            </div>
            <div class="info-card">
                <div class="info-label">Nom complet / Full Name</div>
                <div class="info-value" id="student-name">-</div>
            </div>
            <div class="info-card">
                <div class="info-label">Classe / Class</div>
                <div class="info-value" id="student-class">-</div>
            </div>
            <div class="info-card">
                <div class="info-label">Date de naissance / Date of Birth</div>
                <div class="info-value" id="student-birth">-</div>
            </div>
            <div class="info-card">
                <div class="info-label">Période / Period</div>
                <div class="info-value" id="period">1er Trimestre / 1st Term 2024-2025</div>
            </div>
        </div>
    </div>

    <div class="notes-section">
        <h2 class="section-title">Résultats par matière / Subject Results</h2>
        <table class="notes-table">
            <thead>
                <tr>
                    <th>Matière / Subject</th>
                    <th>Note / Grade</th>
                    <th>Coeff.</th>
                    <th>Moy. Classe / Class Avg.</th>
                    <th>Appréciation / Comments</th>
                </tr>
            </thead>
            <tbody id="notes-tbody"></tbody>
        </table>

        <div class="summary">
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-value" id="moyenne-generale">-</div>
                    <div class="summary-label">Moyenne générale / Overall Average</div>
                </div>
                <div class="summary-card">
                    <div class="summary-value" id="rang">-</div>
                    <div class="summary-label">Rang / Rank</div>
                </div>
                <div class="summary-card">
                    <div class="summary-value" id="moyenne-classe">-</div>
                    <div class="summary-label">Moyenne classe / Class Average</div>
                </div>
            </div>

            <div class="general-appreciation">
                <h3>Appréciation générale / General Comments</h3>
                <p id="appreciation-generale">-</p>
            </div>
        </div>
    </div>

    <div class="footer">
        <p><strong>Année scolaire / Academic Year 2024-2025</strong></p>
        <div class="signatures">
            <div class="signature-block">
                <h4>Le Professeur Principal / Class Teacher</h4>
                <div class="signature-line"></div>
            </div>
            <div class="signature-block">
                <h4>Le Directeur / Headmaster</h4>
                <div class="signature-line"></div>
            </div>
            <div class="signature-block">
                <h4>Les Parents / Parents</h4>
                <div class="signature-line"></div>
            </div>
        </div>
    </div>
</div>

<button class="print-btn" onclick="window.print()">🖨️ Imprimer / Print</button>

<script>
// Subject data from provided table
const subjects = [
    { id_matiere: "Activités pratiques", coef: 1, niveau: "Maternelle", section: "Francophone" },
    { id_matiere: "Anglais", coef: 2, niveau: "Maternelle", section: "Francophone" },
    { id_matiere: "Arithmetic", coef: 2, niveau: "Nursery", section: "Anglophone" },
    { id_matiere: "Arithmétique", coef: 2, niveau: "Maternelle", section: "Francophone" },
    { id_matiere: "Arts Education", coef: 2, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "Développement personnel", coef: 1, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "Drawing and Coloring", coef: 2, niveau: "Nursery", section: "Anglophone" },
    { id_matiere: "Ecriture", coef: 2, niveau: "Maternelle", section: "Francophone" },
    { id_matiere: "Education artistique", coef: 2, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "Education physique", coef: 1, niveau: "Maternelle", section: "Francophone" },
    { id_matiere: "English", coef: 3, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "English Language", coef: 3, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "EPS", coef: 2, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "Français", coef: 3, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "French", coef: 3, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "Graphisme et coloriage", coef: 2, niveau: "Maternelle", section: "Francophone" },
    { id_matiere: "ICT", coef: 2, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "Langue et culture nationale", coef: 1, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "Lecture", coef: 2, niveau: "Maternelle", section: "Francophone" },
    { id_matiere: "Mathematics", coef: 4, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "Mathématiques", coef: 4, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "National Language and Culture", coef: 1, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "Personal Development", coef: 1, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "Physical Education", coef: 1, niveau: "Nursery", section: "Anglophone" },
    { id_matiere: "Practical Activities", coef: 1, niveau: "Nursery", section: "Anglophone" },
    { id_matiere: "Reading", coef: 2, niveau: "Nursery", section: "Anglophone" },
    { id_matiere: "Science and Technology", coef: 3, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "Sciences et technologies", coef: 3, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "Sciences humaines et sociales", coef: 3, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "Social Studies", coef: 3, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "Sport", coef: 2, niveau: "Primary", section: "Anglophone" },
    { id_matiere: "TIC", coef: 2, niveau: "Primaire", section: "Francophone" },
    { id_matiere: "Writing", coef: 2, niveau: "Nursery", section: "Anglophone" }
];

// Simulated student data with Cameroonian names
const schoolData = {
    "Francophone": {
        "Petite Section": [
            {
                id: "1",
                nom: "Nfor",
                prenom: "Marie",
                classe: "Petite Section",
                dateNaissance: "15/03/2020",
                rang: "1",
                moyenneClasse: "13.5",
                photoUrl: "",
                appreciationGenerale: "Excellent travail. Marie est très appliquée.",
                notes: [
                    { matiere: "Activités pratiques", note: 17.0, coefficient: 1, moyenneClasse: 13.0, appreciation: "Très créative" },
                    { matiere: "Anglais", note: 15.0, coefficient: 2, moyenneClasse: 11.0, appreciation: "Bonne participation" },
                    { matiere: "Arithmétique", note: 16.5, coefficient: 2, moyenneClasse: 12.5, appreciation: "Progrès constants" },
                    { matiere: "Ecriture", note: 14.5, coefficient: 2, moyenneClasse: 11.5, appreciation: "Efforts à poursuivre" },
                    { matiere: "Education physique", note: 16.0, coefficient: 1, moyenneClasse: 12.0, appreciation: "Très active" },
                    { matiere: "Graphisme et coloriage", note: 15.5, coefficient: 2, moyenneClasse: 12.5, appreciation: "Bonne maîtrise" },
                    { matiere: "Lecture", note: 14.0, coefficient: 2, moyenneClasse: 11.0, appreciation: "Progrès en lecture" }
                ]
            },
            {
                id: "2",
                nom: "Mbarga",
                prenom: "Jean",
                classe: "Petite Section",
                dateNaissance: "22/06/2020",
                rang: "2",
                moyenneClasse: "13.5",
                photoUrl: "",
                appreciationGenerale: "Bon travail. Jean doit continuer à s'appliquer.",
                notes: [
                    { matiere: "Activités pratiques", note: 15.5, coefficient: 1, moyenneClasse: 13.0, appreciation: "Bon effort" },
                    { matiere: "Anglais", note: 13.5, coefficient: 2, moyenneClasse: 11.0, appreciation: "Participe bien" },
                    { matiere: "Arithmétique", note: 14.0, coefficient: 2, moyenneClasse: 12.5, appreciation: "Progrès constants" },
                    { matiere: "Ecriture", note: 13.0, coefficient: 2, moyenneClasse: 11.5, appreciation: "À améliorer" },
                    { matiere: "Education physique", note: 14.5, coefficient: 1, moyenneClasse: 12.0, appreciation: "Actif" },
                    { matiere: "Graphisme et coloriage", note: 14.0, coefficient: 2, moyenneClasse: 12.5, appreciation: "Bon travail" },
                    { matiere: "Lecture", note: 13.5, coefficient: 2, moyenneClasse: 11.0, appreciation: "Efforts en lecture" }
                ]
            }
        ],
        "CM2": [
            {
                id: "3",
                nom: "Ngoh",
                prenom: "Sophie",
                classe: "CM2",
                dateNaissance: "10/09/2013",
                rang: "1",
                moyenneClasse: "12.8",
                photoUrl: "",
                appreciationGenerale: "Sophie montre un grand intérêt pour les apprentissages.",
                notes: [
                    { matiere: "Français", note: 16.0, coefficient: 3, moyenneClasse: 12.0, appreciation: "Très bonne maîtrise" },
                    { matiere: "Mathématiques", note: 15.0, coefficient: 4, moyenneClasse: 11.5, appreciation: "Solide travail" },
                    { matiere: "English", note: 14.5, coefficient: 3, moyenneClasse: 10.5, appreciation: "Bonne progression" },
                    { matiere: "Sciences et technologies", note: 15.5, coefficient: 3, moyenneClasse: 11.9, appreciation: "Excellente compréhension" },
                    { matiere: "Sciences humaines et sociales", note: 14.0, coefficient: 3, moyenneClasse: 12.1, appreciation: "Bonne participation" },
                    { matiere: "EPS", note: 16.0, coefficient: 2, moyenneClasse: 13.5, appreciation: "Très investie" },
                    { matiere: "Education artistique", note: 15.8, coefficient: 2, moyenneClasse: 12.7, appreciation: "Créativité remarquable" },
                    { matiere: "TIC", note: 14.5, coefficient: 2, moyenneClasse: 11.0, appreciation: "Bonne maîtrise" },
                    { matiere: "Langue et culture nationale", note: 13.5, coefficient: 1, moyenneClasse: 11.5, appreciation: "Intérêt marqué" },
                    { matiere: "Développement personnel", note: 15.0, coefficient: 1, moyenneClasse: 12.0, appreciation: "Bon comportement" }
                ]
            }
        ]
    },
    "Anglophone": {
        "Pre-Nursery": [
            {
                id: "4",
                nom: "Tchoupo",
                prenom: "Lucas",
                classe: "Pre-Nursery",
                dateNaissance: "05/02/2021",
                rang: "1",
                moyenneClasse: "12.0",
                photoUrl: "",
                appreciationGenerale: "Lucas est sérieux et très actif.",
                notes: [
                    { matiere: "Arithmetic", note: 14.0, coefficient: 2, moyenneClasse: 11.8, appreciation: "Bon travail" },
                    { matiere: "Drawing and Coloring", note: 15.0, coefficient: 2, moyenneClasse: 12.0, appreciation: "Très créatif" },
                    { matiere: "Physical Education", note: 16.0, coefficient: 1, moyenneClasse: 12.5, appreciation: "Très énergique" },
                    { matiere: "Practical Activities", note: 14.5, coefficient: 1, moyenneClasse: 11.5, appreciation: "Bon effort" },
                    { matiere: "Reading", note: 13.5, coefficient: 2, moyenneClasse: 11.0, appreciation: "Progrès en lecture" },
                    { matiere: "Writing", note: 14.0, coefficient: 2, moyenneClasse: 11.5, appreciation: "Bonne écriture" }
                ]
            }
        ],
        "Class 6": [
            {
                id: "5",
                nom: "Etoo",
                prenom: "Paul",
                classe: "Class 6",
                dateNaissance: "12/05/2013",
                rang: "2",
                moyenneClasse: "12.4",
                photoUrl: "",
                appreciationGenerale: "Paul montre de l'intérêt et participe bien.",
                notes: [
                    { matiere: "English Language", note: 16.5, coefficient: 3, moyenneClasse: 12.8, appreciation: "Excellent travail" },
                    { matiere: "Mathematics", note: 14.2, coefficient: 4, moyenneClasse: 11.5, appreciation: "Bon travail" },
                    { matiere: "French", note: 13.8, coefficient: 3, moyenneClasse: 12.1, appreciation: "Bonne compréhension" },
                    { matiere: "Science and Technology", note: 15.5, coefficient: 3, moyenneClasse: 11.9, appreciation: "Très bonne maîtrise" },
                    { matiere: "Social Studies", note: 14.0, coefficient: 3, moyenneClasse: 12.0, appreciation: "Bonne participation" },
                    { matiere: "Arts Education", note: 15.8, coefficient: 2, moyenneClasse: 12.7, appreciation: "Créativité remarquable" },
                    { matiere: "ICT", note: 14.5, coefficient: 2, moyenneClasse: 11.0, appreciation: "Bonne maîtrise" },
                    { matiere: "Sport", note: 16.0, coefficient: 2, moyenneClasse: 13.5, appreciation: "Très investi" },
                    { matiere: "National Language and Culture", note: 13.5, coefficient: 1, moyenneClasse: 11.5, appreciation: "Intérêt marqué" },
                    { matiere: "Personal Development", note: 15.0, coefficient: 1, moyenneClasse: 12.0, appreciation: "Bon comportement" }
                ]
            }
        ]
    }
};

// Class structures
const classesBySection = {
    "Francophone": [
        "Petite Section",
        "Moyenne Section",
        "Grande Section",
        "CP",
        "CE1",
        "CE2",
        "CM1",
        "CM2"
    ],
    "Anglophone": [
        "Pre-Nursery",
        "Nursery 1",
        "Nursery 2",
        "Class 1",
        "Class 2",
        "Class 3",
        "Class 4",
        "Class 5",
        "Class 6"
    ]
};

// Level mapping for subject filtering
const levelMapping = {
    "Francophone": {
        "Petite Section": "Maternelle",
        "Moyenne Section": "Maternelle",
        "Grande Section": "Maternelle",
        "CP": "Primaire",
        "CE1": "Primaire",
        "CE2": "Primaire",
        "CM1": "Primaire",
        "CM2": "Primaire"
    },
    "Anglophone": {
        "Pre-Nursery": "Nursery",
        "Nursery 1": "Nursery",
        "Nursery 2": "Nursery",
        "Class 1": "Primary",
        "Class 2": "Primary",
        "Class 3": "Primary",
        "Class 4": "Primary",
        "Class 5": "Primary",
        "Class 6": "Primary"
    }
};

// Function to determine note class
function getNoteClass(note) {
    if (note >= 16) return 'excellent';
    if (note >= 14) return 'bien';
    if (note >= 12) return 'assez-bien';
    return 'passable';
}

// Function to update class dropdown based on selected section
function updateClasses() {
    const sectionSelect = document.getElementById('section-select');
    const classSelect = document.getElementById('class-select');
    const studentSelect = document.getElementById('student-select');
    const selectedSection = sectionSelect.value;

    classSelect.innerHTML = '<option value="">Sélectionner une classe / Select a class</option>';
    classSelect.disabled = !selectedSection;
    studentSelect.innerHTML = '<option value="">Sélectionner un élève / Select a student</option>';
    studentSelect.disabled = true;

    if (selectedSection) {
        classesBySection[selectedSection].forEach(className => {
            const option = document.createElement('option');
            option.value = className;
            option.textContent = className;
            classSelect.appendChild(option);
        });
    }

    updateStudents();
}

// Function to update student dropdown based on selected class
function updateStudents() {
    const sectionSelect = document.getElementById('section-select');
    const classSelect = document.getElementById('class-select');
    const studentSelect = document.getElementById('student-select');
    const selectedSection = sectionSelect.value;
    const selectedClass = classSelect.value;

    studentSelect.innerHTML = '<option value="">Sélectionner un élève / Select a student</option>';
    studentSelect.disabled = !selectedSection || !selectedClass;

    if (selectedSection && selectedClass && schoolData[selectedSection][selectedClass]) {
        schoolData[selectedSection][selectedClass].forEach(student => {
            const option = document.createElement('option');
            option.value = student.id;
            option.textContent = `${student.nom} ${student.prenom}`;
            studentSelect.appendChild(option);
        });
    }

    updateBulletin();
}

// Function to update bulletin based on selected student
function updateBulletin() {
    const sectionSelect = document.getElementById('section-select');
    const classSelect = document.getElementById('class-select');
    const studentSelect = document.getElementById('student-select');
    const selectedSection = sectionSelect.value;
    const selectedClass = classSelect.value;
    const selectedStudentId = studentSelect.value;

    let studentData = {
        nom: "-",
        prenom: "",
        classe: "-",
        dateNaissance: "-",
        rang: "-",
        moyenneClasse: "-",
        photoUrl: "",
        appreciationGenerale: "-",
        notes: []
    };

    if (selectedSection && selectedClass && selectedStudentId) {
        studentData = schoolData[selectedSection][selectedClass].find(student => student.id === selectedStudentId) || studentData;
    }

    // Update student info
    document.getElementById('student-name').textContent = `${studentData.nom} ${studentData.prenom}`;
    document.getElementById('student-class').textContent = studentData.classe;
    document.getElementById('student-birth').textContent = studentData.dateNaissance;

    // Update photo
    const photoElement = document.getElementById('student-photo');
    if (studentData.photoUrl && studentData.photoUrl.trim() !== '') {
        photoElement.innerHTML = `<img src="${studentData.photoUrl}" alt="Photo élève" style="width: 100%; height: 100%; object-fit: cover; border-radius: 3px;">`;
    } else {
        photoElement.innerHTML = '📸';
    }

    // Update notes
    const tbody = document.getElementById('notes-tbody');
    tbody.innerHTML = '';

    let sommeNotes = 0;
    let sommeCoeffs = 0;

    studentData.notes.forEach(note => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="matiere">${note.matiere}</td>
            <td><span class="note ${getNoteClass(note.note)}">${note.note}</span></td>
            <td class="coefficient">${note.coefficient}</td>
            <td class="moyenne-classe">${note.moyenneClasse}</td>
            <td class="appreciation">${note.appreciation}</td>
        `;
        tbody.appendChild(row);

        sommeNotes += note.note * note.coefficient;
        sommeCoeffs += note.coefficient;
    });

    // Update summary
    const moyenneGenerale = sommeCoeffs > 0 ? (sommeNotes / sommeCoeffs).toFixed(1) : '-';
    document.getElementById('moyenne-generale').textContent = moyenneGenerale;
    document.getElementById('rang').textContent = studentData.rang;
    document.getElementById('moyenne-classe').textContent = studentData.moyenneClasse;
    document.getElementById('appreciation-generale').textContent = studentData.appreciationGenerale;
}

// Initialize
window.addEventListener('load', updateClasses);
</script>
</body>
</html>