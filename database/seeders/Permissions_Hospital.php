<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Permissions_Hospital extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hospital Permissions
        $this->command->getOutput()->writeln("<info>*** Hospital Permissions</info>");
        Permission::create(['name' => 'hospital']);

        // -- Employees
        $this->command->getOutput()->writeln("<info>***** Employees</info>");
        Permission::create(['name' => 'hospital.employee']);
        Permission::create(['name' => 'hospital.employee.create']);
        Permission::create(['name' => 'hospital.employee.edit']);
        Permission::create(['name' => 'hospital.employee.show']);
        Permission::create(['name' => 'hospital.employee.delete']);
        Permission::create(['name' => 'hospital.employee.restore']);
        Permission::create(['name' => 'hospital.employee.destroy']);

        // -- Holidays
        $this->command->getOutput()->writeln("<info>***** Holidays</info>");
        Permission::create(['name' => 'hospital.holiday']);
        Permission::create(['name' => 'hospital.holiday.create']);
        Permission::create(['name' => 'hospital.holiday.edit']);
        Permission::create(['name' => 'hospital.holiday.show']);
        Permission::create(['name' => 'hospital.holiday.delete']);
        Permission::create(['name' => 'hospital.holiday.restore']);
        Permission::create(['name' => 'hospital.holiday.destroy']);

        // -- Leaves
        $this->command->getOutput()->writeln("<info>***** Leaves</info>");
        Permission::create(['name' => 'hospital.leave']);
        Permission::create(['name' => 'hospital.leave.create']);
        Permission::create(['name' => 'hospital.leave.edit']);
        Permission::create(['name' => 'hospital.leave.show']);
        Permission::create(['name' => 'hospital.leave.delete']);
        Permission::create(['name' => 'hospital.leave.restore']);
        Permission::create(['name' => 'hospital.leave.destroy']);

        // -- Events
        $this->command->getOutput()->writeln("<info>***** Events</info>");
        Permission::create(['name' => 'hospital.event']);
        Permission::create(['name' => 'hospital.event.create']);
        Permission::create(['name' => 'hospital.event.edit']);
        Permission::create(['name' => 'hospital.event.show']);
        Permission::create(['name' => 'hospital.event.delete']);
        Permission::create(['name' => 'hospital.event.restore']);
        Permission::create(['name' => 'hospital.event.destroy']);

        // -- Pharmacy
        $this->command->getOutput()->writeln("<info>***** Pharmacies</info>");
        Permission::create(['name' => 'hospital.pharmacy']);
        Permission::create(['name' => 'hospital.pharmacy.create']);
        Permission::create(['name' => 'hospital.pharmacy.edit']);
        Permission::create(['name' => 'hospital.pharmacy.show']);
        Permission::create(['name' => 'hospital.pharmacy.delete']);
        Permission::create(['name' => 'hospital.pharmacy.restore']);
        Permission::create(['name' => 'hospital.pharmacy.destroy']);

        // -- Inventory
        $this->command->getOutput()->writeln("<info>***** Inventory</info>");
        Permission::create(['name' => 'hospital.inventory']);
        Permission::create(['name' => 'hospital.inventory.create']);
        Permission::create(['name' => 'hospital.inventory.edit']);
        Permission::create(['name' => 'hospital.inventory.show']);
        Permission::create(['name' => 'hospital.inventory.delete']);
        Permission::create(['name' => 'hospital.inventory.restore']);
        Permission::create(['name' => 'hospital.inventory.destroy']);

        // -- Stocks
        $this->command->getOutput()->writeln("<info>***** Stocks</info>");
        Permission::create(['name' => 'hospital.stock']);
        Permission::create(['name' => 'hospital.stock.create']);
        Permission::create(['name' => 'hospital.stock.edit']);
        Permission::create(['name' => 'hospital.stock.show']);
        Permission::create(['name' => 'hospital.stock.delete']);
        Permission::create(['name' => 'hospital.stock.restore']);
        Permission::create(['name' => 'hospital.stock.destroy']);

        // -- Invoces
        $this->command->getOutput()->writeln("<info>***** Invoices</info>");
        Permission::create(['name' => 'hospital.invoice']);
        Permission::create(['name' => 'hospital.invoice.create']);
        Permission::create(['name' => 'hospital.invoice.edit']);
        Permission::create(['name' => 'hospital.invoice.show']);
        Permission::create(['name' => 'hospital.invoice.delete']);
        Permission::create(['name' => 'hospital.invoice.restore']);
        Permission::create(['name' => 'hospital.invoice.destroy']);

        // -- Doctors
        $this->command->getOutput()->writeln("<info>***** Doctors</info>");
        Permission::create(['name' => 'hospital.doctor']);
        Permission::create(['name' => 'hospital.doctor.create']);
        Permission::create(['name' => 'hospital.doctor.edit']);
        Permission::create(['name' => 'hospital.doctor.show']);
        Permission::create(['name' => 'hospital.doctor.delete']);
        Permission::create(['name' => 'hospital.doctor.restore']);
        Permission::create(['name' => 'hospital.doctor.destroy']);
        Permission::create(['name' => 'hospital.doctor.import']);
        Permission::create(['name' => 'hospital.doctor.export']);

        // -- Nurses
        $this->command->getOutput()->writeln("<info>***** Nurses</info>");
        Permission::create(['name' => 'hospital.nurse']);
        Permission::create(['name' => 'hospital.nurse.create']);
        Permission::create(['name' => 'hospital.nurse.edit']);
        Permission::create(['name' => 'hospital.nurse.show']);
        Permission::create(['name' => 'hospital.nurse.delete']);
        Permission::create(['name' => 'hospital.nurse.restore']);
        Permission::create(['name' => 'hospital.nurse.destroy']);
        Permission::create(['name' => 'hospital.nurse.import']);
        Permission::create(['name' => 'hospital.nurse.export']);

        // -- Patients
        $this->command->getOutput()->writeln("<info>***** Patients</info>");
        Permission::create(['name' => 'hospital.patient']);
        Permission::create(['name' => 'hospital.patient.create']);
        Permission::create(['name' => 'hospital.patient.edit']);
        Permission::create(['name' => 'hospital.patient.show']);
        Permission::create(['name' => 'hospital.patient.delete']);
        Permission::create(['name' => 'hospital.patient.restore']);
        Permission::create(['name' => 'hospital.patient.destroy']);
        Permission::create(['name' => 'hospital.patient.import']);
        Permission::create(['name' => 'hospital.patient.export']);

        // -- Medicines
        $this->command->getOutput()->writeln("<info>***** Medicines</info>");
        Permission::create(['name' => 'hospital.medicine']);
        Permission::create(['name' => 'hospital.medicine.create']);
        Permission::create(['name' => 'hospital.medicine.edit']);
        Permission::create(['name' => 'hospital.medicine.show']);
        Permission::create(['name' => 'hospital.medicine.delete']);
        Permission::create(['name' => 'hospital.medicine.restore']);
        Permission::create(['name' => 'hospital.medicine.destroy']);

        // -- Medicines/Categories
        $this->command->getOutput()->writeln("<info>***** Medicines/Categories</info>");
        Permission::create(['name' => 'hospital.medicine.category']);
        Permission::create(['name' => 'hospital.medicine.category.create']);
        Permission::create(['name' => 'hospital.medicine.category.edit']);
        Permission::create(['name' => 'hospital.medicine.category.show']);
        Permission::create(['name' => 'hospital.medicine.category.delete']);
        Permission::create(['name' => 'hospital.medicine.category.restore']);
        Permission::create(['name' => 'hospital.medicine.category.destroy']);

        // -- Appointments
        $this->command->getOutput()->writeln("<info>***** Appointments</info>");
        Permission::create(['name' => 'hospital.appointment']);
        Permission::create(['name' => 'hospital.appointment.create']);
        Permission::create(['name' => 'hospital.appointment.edit']);
        Permission::create(['name' => 'hospital.appointment.show']);
        Permission::create(['name' => 'hospital.appointment.delete']);
        Permission::create(['name' => 'hospital.appointment.restore']);
        Permission::create(['name' => 'hospital.appointment.destroy']);

        // -- Prescriptions
        $this->command->getOutput()->writeln("<info>***** Prescriptions</info>");
        Permission::create(['name' => 'hospital.prescription']);
        Permission::create(['name' => 'hospital.prescription.create']);
        Permission::create(['name' => 'hospital.prescription.edit']);
        Permission::create(['name' => 'hospital.prescription.show']);
        Permission::create(['name' => 'hospital.prescription.delete']);
        Permission::create(['name' => 'hospital.prescription.restore']);
        Permission::create(['name' => 'hospital.prescription.destroy']);

        // -- Beds
        $this->command->getOutput()->writeln("<info>***** Beds</info>");
        Permission::create(['name' => 'hospital.bed']);
        Permission::create(['name' => 'hospital.bed.create']);
        Permission::create(['name' => 'hospital.bed.edit']);
        Permission::create(['name' => 'hospital.bed.show']);
        Permission::create(['name' => 'hospital.bed.delete']);
        Permission::create(['name' => 'hospital.bed.restore']);
        Permission::create(['name' => 'hospital.bed.destroy']);

        // -- Treatments
        $this->command->getOutput()->writeln("<info>***** Treatment</info>");
        Permission::create(['name' => 'hospital.treatment']);
        Permission::create(['name' => 'hospital.treatment.create']);
        Permission::create(['name' => 'hospital.treatment.edit']);
        Permission::create(['name' => 'hospital.treatment.show']);
        Permission::create(['name' => 'hospital.treatment.delete']);
        Permission::create(['name' => 'hospital.treatment.restore']);
        Permission::create(['name' => 'hospital.treatment.destroy']);

        // -- Mortuary
        $this->command->getOutput()->writeln("<info>***** Mortuary</info>");
        Permission::create(['name' => 'hospital.mortuary']);
        Permission::create(['name' => 'hospital.mortuary.create']);
        Permission::create(['name' => 'hospital.mortuary.edit']);
        Permission::create(['name' => 'hospital.mortuary.show']);
        Permission::create(['name' => 'hospital.mortuary.delete']);
        Permission::create(['name' => 'hospital.mortuary.restore']);
        Permission::create(['name' => 'hospital.mortuary.destroy']);

        // -- Blood Bank
        $this->command->getOutput()->writeln("<info>***** Blood Bank</info>");
        Permission::create(['name' => 'hospital.bloodbank']);
        Permission::create(['name' => 'hospital.bloodbank.create']);
        Permission::create(['name' => 'hospital.bloodbank.edit']);
        Permission::create(['name' => 'hospital.bloodbank.show']);
        Permission::create(['name' => 'hospital.bloodbank.delete']);
        Permission::create(['name' => 'hospital.bloodbank.restore']);
        Permission::create(['name' => 'hospital.bloodbank.destroy']);

        // -- Child Birth
        $this->command->getOutput()->writeln("<info>***** Child Birth</info>");
        Permission::create(['name' => 'hospital.childbirth']);
        Permission::create(['name' => 'hospital.childbirth.create']);
        Permission::create(['name' => 'hospital.childbirth.edit']);
        Permission::create(['name' => 'hospital.childbirth.show']);
        Permission::create(['name' => 'hospital.childbirth.delete']);
        Permission::create(['name' => 'hospital.childbirth.restore']);
        Permission::create(['name' => 'hospital.childbirth.destroy']);

        // -- Ambulance
        $this->command->getOutput()->writeln("<info>***** Ambulance</info>");
        Permission::create(['name' => 'hospital.ambulance']);
        Permission::create(['name' => 'hospital.ambulance.create']);
        Permission::create(['name' => 'hospital.ambulance.edit']);
        Permission::create(['name' => 'hospital.ambulance.show']);
        Permission::create(['name' => 'hospital.ambulance.delete']);
        Permission::create(['name' => 'hospital.ambulance.restore']);
        Permission::create(['name' => 'hospital.ambulance.destroy']);

        // -- Laboratory
        $this->command->getOutput()->writeln("<info>***** Laboratories</info>");
        Permission::create(['name' => 'hospital.laboratory']);
        Permission::create(['name' => 'hospital.laboratory.create']);
        Permission::create(['name' => 'hospital.laboratory.edit']);
        Permission::create(['name' => 'hospital.laboratory.show']);
        Permission::create(['name' => 'hospital.laboratory.delete']);
        Permission::create(['name' => 'hospital.laboratory.restore']);
        Permission::create(['name' => 'hospital.laboratory.destroy']);

        // -- Specialist
        $this->command->getOutput()->writeln("<info>***** Specialists</info>");
        Permission::create(['name' => 'hospital.specialist']);
        Permission::create(['name' => 'hospital.specialist.create']);
        Permission::create(['name' => 'hospital.specialist.edit']);
        Permission::create(['name' => 'hospital.specialist.show']);
        Permission::create(['name' => 'hospital.specialist.delete']);
        Permission::create(['name' => 'hospital.specialist.restore']);
        Permission::create(['name' => 'hospital.specialist.destroy']);

        // -- Departments
        $this->command->getOutput()->writeln("<info>***** Department</info>");
        Permission::create(['name' => 'hospital.department']);
        Permission::create(['name' => 'hospital.department.create']);
        Permission::create(['name' => 'hospital.department.edit']);
        Permission::create(['name' => 'hospital.department.show']);
        Permission::create(['name' => 'hospital.department.delete']);
        Permission::create(['name' => 'hospital.department.restore']);
        Permission::create(['name' => 'hospital.department.destroy']);
    }
}
