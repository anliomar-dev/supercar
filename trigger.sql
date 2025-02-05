CREATE OR REPLACE FUNCTION generate_voucher_request_ref()
RETURNS trigger AS $$
DECLARE
    max_voucher_id INTEGER;
    new_request_ref VARCHAR;
    voucher_quantity INTEGER;
BEGIN
    SELECT MAX(id) INTO max_voucher_id FROM vms_app_voucher;

    IF max_voucher_id IS NULL THEN
        max_voucher_id := 0;
    END IF;

    voucher_quantity := NEW.quantity_of_vouchers;

    -- Générer la référence selon le format(exp: VRQ-000048-123001/123200 )
    new_request_ref := 'VRQ-' || LPAD(CAST(NEW.id AS TEXT), 6, '0') || '-' || 
        (max_voucher_id + 1) || '/' || 
        (max_voucher_id + voucher_quantity);

    NEW.request_ref := new_request_ref;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;


CREATE TRIGGER before_insert_voucher_request
BEFORE INSERT ON vms_app_voucherrequest
FOR EACH ROW
EXECUTE FUNCTION generate_voucher_request_ref();




-- stored procedure for voucher ref generation(exp: VR-0000097-1000)
CREATE OR REPLACE FUNCTION generate_voucher_ref()
RETURNS trigger AS $$
DECLARE
    voucher_price DECIMAL;
    new_voucher_ref VARCHAR;
BEGIN
    voucher_price := NEW.amount;
    -- Générer la référence du voucher (ex: VR-0000001-100)
    new_voucher_ref := 'VR-' || LPAD(CAST(NEW.id AS TEXT), 7, '0') || '-' || CAST(voucher_price AS TEXT);

    NEW.voucher_ref := new_voucher_ref;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

--trigger before insert on voucher table
CREATE TRIGGER before_insert_voucher
BEFORE INSERT ON vms_app_voucher
FOR EACH ROW
EXECUTE FUNCTION generate_voucher_ref();
