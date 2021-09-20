<x-layout>
    <section>
         <main>
let autocomplete: google.maps.places.Autocomplete;
let address1Field: HTMLInputElement;
let address2Field: HTMLInputElement;
let postalField: HTMLInputElement;

function initAutocomplete() {
  address1Field = document.querySelector("#ship-address") as HTMLInputElement;
  address2Field = document.querySelector("#address2") as HTMLInputElement;
  postalField = document.querySelector("#postcode") as HTMLInputElement;

  
  autocomplete = new google.maps.places.Autocomplete(address1Field, {
    componentRestrictions: { country: ["us", "ca"] },
    fields: ["address_components", "geometry"],
    types: ["address"],
  });
  address1Field.focus();

  
  autocomplete.addListener("place_changed", fillInAddress);
}

function fillInAddress() {
  const place = autocomplete.getPlace();
  let address1 = "";
  let postcode = "";

  for (const component of place.address_components as google.maps.GeocoderAddressComponent[]) {
    const componentType = component.types[0];

    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`;
        break;
      }

      case "route": {
        address1 += component.short_name;
        break;
      }

      case "postal_code": {
        postcode = `${component.long_name}${postcode}`;
        break;
      }

      case "postal_code_suffix": {
        postcode = `${postcode}-${component.long_name}`;
        break;
      }

      case "locality":
        (document.querySelector("#locality") as HTMLInputElement).value =
          component.long_name;
        break;

      case "administrative_area_level_1": {
        (document.querySelector("#state") as HTMLInputElement).value =
          component.short_name;
        break;
      }

      case "country":
        (document.querySelector("#country") as HTMLInputElement).value =
          component.long_name;
        break;
    }
  }

  address1Field.value = address1;
  postalField.value = postcode;

  // After filling the form with address components from the Autocomplete
  // prediction, set cursor focus on the second address line to encourage
  // entry of subpremise information such as apartment, unit, or floor number.
  address2Field.focus();
}
    
        </main>
    </section>
</x-layout>